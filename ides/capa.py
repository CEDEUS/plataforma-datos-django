# coding=utf-8
import urllib2,base64,json
import sys,os
from ides.models import Categorias,Funciona,Privacidad
from datetime import datetime
from django.utils import timezone

timezone.now()

reload(sys)
sys.setdefaultencoding('utf-8')

def traductor_categoria(categoria):
	if categoria == 'society':
		return 'Sociedad'
	elif categoria == 'boundaries':
		return 'Fronteras'
	elif categoria == 'health':
		return 'Salud'
	elif categoria == 'economy':
		return 'Economía'
	elif categoria == 'elevation':
		return 'Elevación'
	elif categoria == 'environment':
		return 'Medio ambiente'
	elif categoria == 'farming':
		return 'Agricultura'
	elif categoria == 'geoscientificInformation':
		return 'Información geocientífica'
	elif categoria == 'climatologyMeteorologyAtmosphere':
		return 'Climatología'
	elif categoria == 'imageryBaseMapsEarthCover':
		return 'Imágenes satelitales'
	elif categoria == 'inlandWaters':
		return 'Aguas terrestres'
	elif categoria == 'intelligenceMilitary':
		return 'Inteligencia militar'
	elif categoria == 'location':
		return 'Localización'
	elif categoria == 'oceans':
		return 'Oceanos'
	elif categoria == 'planningCadastre':
		return 'Planificación catastro'
	elif categoria == 'structure':
		return 'Infraestructura'
	elif categoria == 'transportation':
		return 'Transporte'
	elif categoria == 'utilitiesCommunication':
		return 'Comunicaciones'
	elif categoria == 'biota':
		return 'Biota'
	else:
		return ''

def decodificador(palabra):
	p=palabra

	if '&#237;' in p:
		p=p.replace('&#237;',u'í')
	if '&#205;' in p:
		p=p.replace('&#205;',u'Í')

	if '&#250;' in p:
		p=p.replace('&#250;',u'ú')
	if '&#243;' in p:
		p=p.replace('&#243;',u'ó')

	if '&#193;' in p:
		p=p.replace('&#193;',u'á')
	if '&#225;' in p:
		p=p.replace('&#225;',u'á')

	if '&#233;' in p:
		p=p.replace('&#233;',u'é')

	if '&#209;' in p:
		p=p.replace('&#209;',u'Ñ')
	if '&#241;' in p:
		p=p.replace('&#241;',u'ñ')

	if '&#129;' in p:
		p=p.replace('&#129;',u'')
	if '&#173;' in p:
		p=p.replace('&#173;',u'')

	if '&#186;' in p:
		p=p.replace('&#186;',u'°')

	return p


def info_capas(u,p,i,w,d,l):

	user=u
	password=p
	ide=i
	workspace=w
	datastore=d
	layer=l

	keywords=[]
	title=""
	date=timezone.now()
	abstract=""
	category=""
	metadata=""

	request=urllib2.Request(ide+"/geoserver/rest/workspaces/"+workspace+"/datastores/"+datastore+"/featuretypes/"+layer+".json")
	request2=urllib2.Request(ide+"/geoserver/rest/workspaces/"+workspace+"/coveragestores/"+datastore+"/featuretypes/"+layer+".json")
	base64string=base64.b64encode('%s:%s' %(user,password))
	request.add_header("Authorization","Basic %s" % base64string)
	request2.add_header("Authorization","Basic %s" % base64string)

	try:
		result=urllib2.urlopen(request)
	except urllib2.HTTPError,e:
		pass
	try:
		result=urllib2.urlopen(request2)
	except urllib2.HTTPError,e:
		pass


	for x in result:
		data_json=x

	data=json.loads(data_json)

	if 'metadataLinks' in data['featureType']:
	
		for x in range(0,len(data['featureType']['metadataLinks']['metadataLink'])):
			if data['featureType']['metadataLinks']['metadataLink'][x]['metadataType']=='TC211':
				metadata=data['featureType']['metadataLinks']['metadataLink'][x]['content']

		request3=urllib2.Request(metadata)
		request3.add_header("Authorization","Basic %s" % base64string)
		result2=urllib2.urlopen(request3)

		for x in result2:
			if '<gmd:title>' in x:
				a=next(result2)
				b=a.split('>')
				c=b[1].split('<')
				title=c[0].decode('latin')
				title=decodificador(title)

			if '<gmd:date>' in x:
				a=next(result2)
				b=a.split('>')
				c=b[1].split('<')
				d=c[0]
				if 'T' in d:
					d=d.replace('-',u' ')
					d=d.replace('T',u' ')
					d=d.replace('Z',u'')
					dal=datetime.strptime(d,'%Y %m %d %H:%M:%S')
					da=timezone.make_aware(dal,timezone.get_current_timezone())
				else:
					da=timezone.now()

				date=da

			if '<gmd:abstract>' in x:
				a=next(result2)
				b=a.split('>')
				c=b[1].split('<')
				abstract=c[0]
				abstract=decodificador(abstract)
			if '<gmd:keyword>' in x:
				a=next(result2)
				b=a.split('>')
				c=b[1].split('<')
				keywords.append(c[0])	
			if 'MD_TopicCategoryCode' in x:
				a=x
				b=a.split('>')
				c=b[1].split('<')
				category=c[0]
				category=traductor_categoria(category)

		keys='-'.join(str(e) for e in keywords)

		return [title,category,date,abstract,keys,layer,workspace]

	else:
		date1=datetime.strptime('2017 02 07 13:18:00','%Y %m %d %H:%M:%S')
		date=timezone.make_aware(date1,timezone.get_current_timezone())
		if 'title' in data['featureType']:
			title=data['featureType']['title']
			
			if 'keywords' in data['featureType']:
				ke=data['featureType']['keywords']['string']
				k='-'.join(str(e) for e in ke)
			else:
				k=""
			
		else:
			title=data['featureType']['name']
			k=""
		return [title,k,date,"","",layer,workspace]


def privacidad_capa(target):

	priva='publico'

	if Privacidad.objects.filter(nombre=target).exists():
		c=Privacidad.objects.get(nombre=target)
		priva = c.privacidad

	return priva



def sube_capas(u,p,i,db):
	user=u
	password=p
	ide=i
	ide_db=db

	datastores=[]
	layers=[]
	request4=urllib2.Request(ide+"/geoserver/rest/workspaces.json")
	base64string=base64.b64encode('%s:%s' %(user,password))
	request4.add_header("Authorization","Basic %s" % base64string)
	result3=urllib2.urlopen(request4)
	for x in result3:
			workspaces_json=x

	workspaces=json.loads(workspaces_json)

	total_workspace=len(workspaces['workspaces']['workspace'])#[0]['name']

	for i in range(0,total_workspace):
			workspace=workspaces['workspaces']['workspace'][i]['name']
							
			request5=urllib2.Request(ide+"/geoserver/rest/workspaces/"+workspace+".html")
			request5.add_header("Authorization","Basic %s" % base64string)
			result4=urllib2.urlopen(request5)

			for x in result4:
					if 'datastores' in x:
							a=x.split('.html">',1)
							b=a[1].split('</a>',1)
							datastores.append(b[0])
			for datastore in datastores:
					request6=urllib2.Request(ide+"/geoserver/rest/workspaces/"+workspace+"/datastores/"+datastore+".html")
					request7=urllib2.Request(ide+"/geoserver/rest/workspaces/"+workspace+"/coveragestores/"+datastore+".html")
					request6.add_header("Authorization","Basic %s" % base64string)
					request7.add_header("Authorization","Basic %s" % base64string)

					try:
						result5=urllib2.urlopen(request6)
					except urllib2.HTTPError,e:
						pass
					try:
						result5=urllib2.urlopen(request7)
					except urllib2.HTTPError,e:
						pass

					for x in result5:
							if '<li>' in x:
									if 'featuretypes' in x:
											a=x.split('.html">',1)
											b=a[1].split('</a>',1)
											layers.append(b[0])

					for layer in layers:
							arreglo=info_capas(user,password,ide,workspace,datastore,layer)

							privacidad=privacidad_capa(arreglo[5])
							if ide_db=="OCUC":
								ca=Funciona.objects.create(titulo=arreglo[0],categoria=arreglo[1],fecha=arreglo[2],abstract=arreglo[3],keys=arreglo[4],name=arreglo[5],workspace=arreglo[6],ide="OCUC",privacidad=privacidad)
								ca.save()
							elif ide_db=='CIGIDEN':
								ca=Funciona.objects.create(titulo=arreglo[0],categoria=arreglo[1],fecha=arreglo[2],abstract=arreglo[3],keys=arreglo[4],name=arreglo[5],workspace=arreglo[6],ide='CIGIDEN',privacidad=privacidad)
								ca.save()
							elif ide_db=='CEDEUS':
								ca=Funciona.objects.create(titulo=arreglo[0],categoria=arreglo[1],fecha=arreglo[2],abstract=arreglo[3],keys=arreglo[4],name=arreglo[5],workspace=arreglo[6],ide='CEDEUS',privacidad=privacidad)
								ca.save()									

					layers=[]

			datastores=[]
	return None

def borrar_capas(ide):
	Funciona.objects.filter(ide=ide).delete()
	return None









