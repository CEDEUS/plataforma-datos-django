from django.core.management.base import BaseCommand, CommandError
from optparse import make_option, OptionParser
import os
import logging
import urllib2,base64,json
from ides.models import Categorias,Funciona,UrlPendientes
from datetime import datetime,timedelta
from ides.capa import info_capas,sube_capas,borrar_capas,privacidad_capa

class Command(BaseCommand):

	help = "Importa capas a base de datos"
	option_list = (
		make_option('-d', '--delete',action='store', dest='delete',default='0'),
		)
	def handle(self, *app_labels,**options):
		if options['delete'] == '1':
			UrlPendientes.objects.all().delete()
		for pendiente in UrlPendientes.objects.filter(pendiente=True):
			try:
				print pendiente.ide + ' - ' + pendiente.layer
				arreglo=info_capas(pendiente.user,pendiente.password,pendiente.ide,pendiente.workspace,pendiente.datastore,pendiente.layer)
				privacidad=privacidad_capa(arreglo[5])
				if "ideocuc" in pendiente.ide or '190.107.177.27' in pendiente.ide:
					ca=Funciona(titulo=arreglo[0],categoria=arreglo[1],fecha=arreglo[2],abstract=arreglo[3],keys=arreglo[4],name=arreglo[5],workspace=arreglo[6],ide="OCUC",privacidad=privacidad)
					ca.save()
				elif 'cigiden' in pendiente.ide:
					ca=Funciona(titulo=arreglo[0],categoria=arreglo[1],fecha=arreglo[2],abstract=arreglo[3],keys=arreglo[4],name=arreglo[5],workspace=arreglo[6],ide='CIGIDEN',privacidad=privacidad)
					ca.save()
				elif 'cedeus' in pendiente.ide:
					ca=Funciona(titulo=arreglo[0],categoria=arreglo[1],fecha=arreglo[2],abstract=arreglo[3],keys=arreglo[4],name=arreglo[5],workspace=arreglo[6],ide='CEDEUS',privacidad=privacidad)
					ca.save()
				else:
					print pendiente.ide
					raise ValueError
				pendiente.pendiente=False
				pendiente.save()
			except Exception as e:
				print "Error"
				print e
		UrlPendientes.objects.filter(pendiente=False).delete()
