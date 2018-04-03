from django.shortcuts import render_to_response,render
from django.http import HttpResponse,HttpResponseRedirect
from django.views.decorators.clickjacking import xframe_options_exempt
from ides.models import Categorias,Funciona,Privacidad,Usuarios
from ides.forms import PrivForm,SearchForm
from django.db.models import Q,Sum
import datetime
from dateutil.relativedelta import *
from django.utils import timezone
from django.core.paginator import Paginator, EmptyPage, PageNotAnInteger
from django.core.mail import send_mail
from django.utils.crypto import get_random_string
import hashlib
#from codigo import suma

timezone.now()

def convertDatetimeToString(o):
	DATE_FORMAT="%Y-%m-%d"
	TIME_FORMAT="%H:%M:%S"

	if isinstance(o,datetime.date):
		return o.strftime(DATE_FORMAT)
	elif isinstance(o,datetime.time):
		return o.strftime(TIME_FORMAT)
	elif isinstance(o,datetime.datetime):
		return o.strftime("%s %s" % (DATE_FORMAT,TIME_FORMAT))


def index(request):
	if request.method == 'POST':
		cerrar = request.POST['cerrar']
		if cerrar:
			del request.session['user_name']
			request.session.modified = True

	categorias=Categorias.objects.all().order_by('nombre')
	return render(request,'index.php',{'categorias':categorias})

def quienes_somos(request):
	return render(request,'quienes_somos.php')

@xframe_options_exempt
def buscador(request):
	today=datetime.date.today()
	x=''
	resultado=Funciona.objects.filter(privacidad='publico').order_by('-fecha')
	recientes=Funciona.objects.all().order_by('-fecha')[:5]

	if request.method == 'GET' and 'busqueda' in request.GET:
		b=request.GET['busqueda']
		if b is not None and b != '':

			if 'categoria' in request.GET:
				categoria=request.GET['categoria']
			else:
				categoria='CATEGORIA'

			if 'origen' in request.GET:
				origen=request.GET['origen']
			else:
				origen='ORIGEN'

			if 'orden' in request.GET:
				orden=request.GET['orden']
			else:
				orden='titulo'

			if 'fecha' in request.GET:
				fecha=request.GET['fecha']
			else:
				fecha='-fecha'

			x=b
			x=x.replace('+',' ')

			if categoria != 'CATEGORIA' and origen != 'ORIGEN':
				resultado=Funciona.objects.filter(Q(titulo__unaccent__icontains=x)|Q(abstract__unaccent__icontains=x),privacidad='publico',categoria=categoria,ide=origen).order_by(fecha,orden)

			elif categoria != 'CATEGORIA' and origen == 'ORIGEN':
				resultado=Funciona.objects.filter(Q(titulo__unaccent__icontains=x)|Q(abstract__unaccent__icontains=x),privacidad='publico',categoria=categoria).order_by(fecha,orden)
			
			elif categoria == 'CATEGORIA' and origen != 'ORIGEN':
				resultado=Funciona.objects.filter(Q(titulo__unaccent__icontains=x)|Q(abstract__unaccent__icontains=x),ide=origen,privacidad='publico').order_by(fecha,orden)

			else:
				resultado=Funciona.objects.filter(Q(titulo__unaccent__icontains=x)|Q(abstract__unaccent__icontains=x),privacidad='publico').order_by(fecha,orden)
		else:

			if 'categoria' in request.GET:
				categoria=request.GET['categoria']
			else:
				categoria=''

			if 'origen' in request.GET:
				origen=request.GET['origen']
			else:
				origen=''

			if 'orden' in request.GET:
				orden=request.GET['orden']
			else:
				orden=''

			if 'fecha' in request.GET:
				fecha=request.GET['fecha']
			else:
				fecha=''

			if categoria != 'CATEGORIA' and origen != 'ORIGEN':
				resultado=Funciona.objects.filter(categoria=categoria,ide=origen,privacidad='publico').order_by(fecha,orden)

			elif categoria != 'CATEGORIA' and origen == 'ORIGEN':
				resultado=Funciona.objects.filter(categoria=categoria,privacidad='publico').order_by(fecha,orden)
			
			elif categoria == 'CATEGORIA' and origen != 'ORIGEN':
				resultado=Funciona.objects.filter(ide=origen,privacidad='publico').order_by(fecha,orden)

			else:
				resultado=Funciona.objects.filter(privacidad='publico').order_by(fecha,orden)


		page = request.GET.get('page',1)
		paginator=Paginator(resultado,10)		
		try:
			page = int(request.GET.get('page', '1'))
		except:
			page = 1
		try:
			capas = paginator.page(page)
		except(EmptyPage, InvalidPage):
			capas = paginator.page(1)
	
		index = capas.number - 1 
		max_index = len(paginator.page_range)
		start_index = index - 5 if index >= 5 else 0
		end_index = index + 5 if index <= max_index - 5 else max_index
		page_range = list(paginator.page_range)[start_index:end_index]

		for a in capas:
			relativo=relativedelta(today,a.fecha.date())
			anos=""
			meses=""
			dias=""
	
			if relativo.years == 1:
				anos=str(relativo.years)+' a\xc3\xb1o'
			if relativo.months == 1:
				meses=str(relativo.months)+' mes'
			if relativo.days == 1:
				dias=str(relativo.days)+' d\xc3\xada '
	
			if relativo.years > 1:
				anos=str(relativo.years)+' a\xc3\xb1os'
			if relativo.months > 1:
				meses=str(relativo.months)+' meses'
			if relativo.days > 1:
				dias=str(relativo.days)+' d\xc3\xadas'
	
			a.fecha='hace '+anos+' '+meses+' '+dias+'.'

		return render(request,'buscador.php',{'content':capas,'recientes':recientes,'bus':x,'categoria':categoria,'origen':origen,'orden':orden,'fecha':fecha,'page_range': page_range,'max_index':max_index})		

	else:
		page = request.GET.get('page',1)
		paginator=Paginator(resultado,10)		
		try:
			page = int(request.GET.get('page', '1'))
		except:
			page = 1
		try:
			capas = paginator.page(page)
		except(EmptyPage, InvalidPage):
			capas = paginator.page(1)
	
		index = capas.number - 1 
		max_index = len(paginator.page_range)
		start_index = index - 5 if index >= 5 else 0
		end_index = index + 5 if index <= max_index - 5 else max_index
		page_range = list(paginator.page_range)[start_index:end_index]


		for a in capas:
			relativo=relativedelta(today,a.fecha.date())
			anos=""
			meses=""
			dias=""
	
			if relativo.years == 1:
				anos=str(relativo.years)+' a\xc3\xb1o'
			if relativo.months == 1:
				meses=str(relativo.months)+' mes'
			if relativo.days == 1:
				dias=str(relativo.days)+' d\xc3\xada '
	
			if relativo.years > 1:
				anos=str(relativo.years)+' a\xc3\xb1os'
			if relativo.months > 1:
				meses=str(relativo.months)+' meses'
			if relativo.days > 1:
				dias=str(relativo.days)+' d\xc3\xadas'
	
			a.fecha='hace '+anos+' '+meses+' '+dias+'.'

		return render(request,'buscador.php',{'content':capas,'recientes':recientes,'bus':x,'page_range': page_range,'max_index':max_index})

def resultado(request):
    return render_to_response('resultado.php')

def add_capa(request):
	nombre='100'
	categoria='cat1'
	abstract='abst1'
	#ca=Capa.objects.create(nombre=nombre,categoria=categoria,abstract=abstract,)
	#ca.save()
	if(Funciona.objects.get(titulo='Usos preferentes Plan Regulador Comunal Las Condes')):
		nombre="sis"
	return render(request,'buscador.php',{'content':nombre})


def user_admin(request):
	sesion=''
	form = PrivForm()
	if request.session.has_key('user_name'):
		sesion=request.session['user_name']
		m=Usuarios.objects.get(usuario=sesion)
		sesion=m.usuario
		capas=Funciona.objects.filter(ide=m.centro).order_by('name')
		total=Funciona.objects.count()
		total_centro=Funciona.objects.filter(ide=m.centro).count()
		if request.method == 'POST':
			# create a form instance and populate it with data from the request:

			if 'change' in request.POST:
				form = PrivForm(request.POST)
		
			# check whether it's valid:
				if form.is_valid():

					nombre_capa=form.cleaned_data['nombre']
					privacidad_capa=form.cleaned_data['privacidad']
					if Privacidad.objects.filter(nombre=nombre_capa).exists():
						Privacidad.objects.filter(nombre=nombre_capa,ide=m.centro).update(privacidad=privacidad_capa)
						Funciona.objects.filter(name=nombre_capa,ide=m.centro).update(privacidad=privacidad_capa)
					else:
						Privacidad.objects.create(nombre=nombre_capa,privacidad=privacidad_capa,ide=m.centro)
						Funciona.objects.filter(name=nombre_capa,ide=m.centro).update(privacidad=privacidad_capa)
			
			
					return render(request,'admin.php',{'content':capas,'form':form,'total':total,'t_centro':total_centro,'sesion':sesion,'centro':m.centro})
			else:
				form = SearchForm(request.POST)
				if form.is_valid():
					find=form.cleaned_data['find']
					capa=Funciona.objects.filter(name__unaccent__icontains=find,ide=m.centro)
					return render(request,'admin.php',{'content':capa,'form':form,'total':total,'t_centro':total_centro,'sesion':sesion,'centro':m.centro})
		# if a GET (or any other method) we'll create a blank form
		else:
			form = PrivForm()
		return render(request,'admin.php',{'content':capas,'form':form,'total':total,'t_centro':total_centro,'sesion':sesion,'centro':m.centro})
	else:
		return HttpResponse("Debe iniciar sesion")


def user_admin_perfil(request):
	if request.method == 'POST' and 'user' in request.POST:
		user = request.POST['user']
		if user:
			u=Usuarios.objects.get(usuario=user)
			return render(request,'admin_perfil.php',{'user':u,})
	elif request.method == 'POST' and 'editar1' in request.POST:
		user = request.POST['name']
		email= request.POST['email']
		password=hashlib.sha1(request.POST['password'])
		sesion=request.POST['user_sesion']
		u=Usuarios.objects.get(usuario=sesion)
		if password.hexdigest() == u.password:
			Usuarios.objects.filter(usuario=sesion).update(usuario=user,correo=email)
			u=Usuarios.objects.get(usuario=user)
			request.session['user_name']=u.usuario
			return render(request,'admin_perfil.php',{'user':u,'respuesta':'success'})
		else:
			u=Usuarios.objects.get(usuario=user)
			return render(request,'admin_perfil.php',{'user':u,'respuesta':'error'})
	elif request.method == 'POST' and 'editar2' in request.POST:
		sesion=request.POST['user_sesion']
		pass_old=request.POST['password']
		pass_new=request.POST['password1']
		pass_new2=request.POST['password2']
		u=Usuarios.objects.get(usuario=sesion)
		if hashlib.sha1(pass_old).hexdigest() == u.password:
			if pass_new == pass_new2:
				h = hashlib.sha1(pass_new)
				Usuarios.objects.filter(usuario=sesion).update(password=h.hexdigest())
				return render(request,'admin_perfil.php',{'user':u,'respuesta':'success'})
			else:
				return render(request,'admin_perfil.php',{'user':u,'respuesta':'error2'})
		else:
			return render(request,'admin_perfil.php',{'user':u,'respuesta':'error'})

	else:
		sesion=request.session['user_name']
		u=Usuarios.objects.get(usuario=sesion)
		return render(request,'admin_perfil.php',{'user':u,})

def categoria(request):
	#ocuc=Capas_ocuc.objects.all()
	x='bounderies'
	order='titulo'
	fecha='-fecha'
	origen='ORIGEN'

	if request.method == 'GET' and 'cat' in request.GET:
		x=request.GET['cat']
	if request.method == 'GET' and 'order' in request.GET:
		order=request.GET['order']
	if request.method == 'GET' and 'fecha' in request.GET:
		fecha=request.GET['fecha']
	if request.method == 'GET' and 'origen' in request.GET:
		origen=request.GET['origen']

	if origen != 'ORIGEN':
		capas=Funciona.objects.filter(categoria=x,ide=origen,privacidad='publico').order_by(fecha,order)
	else:
		capas=Funciona.objects.filter(categoria=x,privacidad='publico').order_by(fecha,order)

	page = request.GET.get('page',1)
	paginator=Paginator(capas,10)		
	try:
		page = int(request.GET.get('page', '1'))
	except:
		page = 1
	try:
		cap = paginator.page(page)
	except(EmptyPage, InvalidPage):
		cap = paginator.page(1)

	index = cap.number - 1 
	max_index = len(paginator.page_range)
	start_index = index - 5 if index >= 5 else 0
	end_index = index + 5 if index <= max_index - 5 else max_index
	page_range = list(paginator.page_range)[start_index:end_index]

	descripcion=Categorias.objects.get(nombre=x)

	today=datetime.date.today()

	for a in cap:
		relativo=relativedelta(today,a.fecha.date())
		anos=""
		meses=""
		dias=""

		if relativo.years == 1:
			anos=str(relativo.years)+' a\xc3\xb1o'
		if relativo.months == 1:
			meses=str(relativo.months)+' mes'
		if relativo.days == 1:
			dias=str(relativo.days)+' d\xc3\xada '

		if relativo.years > 1:
			anos=str(relativo.years)+' a\xc3\xb1os'
		if relativo.months > 1:
			meses=str(relativo.months)+' meses'
		if relativo.days > 1:
			dias=str(relativo.days)+' d\xc3\xadas'

		a.fecha='hace '+anos+' '+meses+' '+dias+'.'

	caa=Categorias.objects.get(nombre=x)
	return render(request,'categoria.php',{'content':cap,'descripcion':descripcion.descripcion,'cat':x,'order':order,'fecha':fecha,'caa':caa,'origen':origen,'page_range': page_range,'max_index':max_index})


def codigo(request):    
    variable=100
    return render(request,'codigo.php',{'content':['la variable vale',variable]})
# Create your views here.

def paginando(request):
	resultado=Funciona.objects.all().order_by('-fecha')
	page = request.GET.get('page',1)
	paginator=Paginator(resultado,10)

	try:
		page = int(request.GET.get('page', '1'))
	except:
		page = 1
	try:
		capas = paginator.page(page)
	except(EmptyPage, InvalidPage):
		capas = paginator.page(1)

	index = capas.number - 1 
	max_index = len(paginator.page_range)
	start_index = index - 5 if index >= 5 else 0
	end_index = index + 5 if index <= max_index - 5 else max_index
	page_range = list(paginator.page_range)[start_index:end_index]

	return render(request,'paginando.php',{'content':capas,'page_range': page_range,'max_index':max_index})

def login(request):
	form = PrivForm()
	if request.method == 'POST' and 'submit' in request.POST:
		if (request.POST['userName'] and request.POST['userPassword']):
			if Usuarios.objects.filter(usuario=request.POST['userName']).exists():
				m=Usuarios.objects.get(usuario=request.POST['userName'])
				h = hashlib.sha1(request.POST['userPassword'])
				if m.password == h.hexdigest():
					request.session['user_name']=m.usuario
					request.session.modified = True
					capas=Funciona.objects.filter(ide=m.centro).order_by('name')
					total=Funciona.objects.count()
					total_centro=Funciona.objects.filter(ide=m.centro).count()
					return render(request,'admin.php',{'content':capas,'form':form,'total':total,'t_centro':total_centro,'centro':m.centro,'sesion':m.usuario})
				else:
					return render(request,'login.php',{'respuesta':'error2'})
			else:
				return render(request,'login.php',{'respuesta':'error'})
	elif request.method == 'POST' and 'submit2' in request.POST:
		email=request.POST['email']
		if Usuarios.objects.filter(correo=email).exists():
			final_subject='[Cambio clave PD]'
			pass_new=get_random_string(length=8)
			h = hashlib.sha1(pass_new)
			Usuarios.objects.filter(correo=email).update(password=h.hexdigest())
			final_message="Su nueva clave es: "+pass_new
			send_mail(final_subject,final_message,'django@plataformadedatos.cl',[email],fail_silently=False,auth_password='dj4n50*',)
			return render(request,'login.php',{'respuesta':'success'})
		else:
			return render(request,'login.php',{'respuesta':'error3'})
	else:
		return render(request,'login.php')

def sesion(request):

	m=Usuarios.objects.get(usuario=request.POST['userName'])
	if m.password == hashlib.sha1(request.POST['userPassword']):
		request.session['user_name']=m.usuario
		return HttpResponse("Ingreso")
	else:
		return HttpResponse("no ingreso")

def send_email(request):
	name=request.GET['name']
	email=request.GET['email']
	motivo=request.GET['motivo']
	to=request.GET['to']
	subject=request.GET['subject']
	message=request.GET['message']
	final_subject="["+motivo+"]"+subject
	final_message=" nombre:"+name+"\n email:"+email+"\n mensaje:"+message

	send_mail(final_subject,final_message,'django@plataformadedatos.cl',['contacto@plataformadedatos.cl'],fail_silently=False,auth_password='dj4n50*',)
	
	return HttpResponse("Mensaje enviado, muchas gracias.")
