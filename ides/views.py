from django.shortcuts import render_to_response,render
from django.http import HttpResponse,HttpResponseRedirect
from django.views.decorators.clickjacking import xframe_options_exempt
from ides.models import Categorias,Funciona,Privacidad,Usuarios
from ides.forms import PrivForm,SearchForm
from django.db.models import Q,Sum
from datetime import datetime, timedelta
from django.utils import timezone
from django.core.paginator import Paginator, EmptyPage, PageNotAnInteger
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

@xframe_options_exempt
def buscador(request):
	x=''
	resultado=Funciona.objects.filter(privacidad='publico').order_by('-fecha')
	recientes=Funciona.objects.all().order_by('-fecha')[:5]

	if request.method == 'GET' and 'busqueda' in request.GET:
		b=request.GET['busqueda']
		if b is not None and b != '':

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
	usuarios=Usuarios.objects.all()

	return render(request,'admin_perfil.php')

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
		capas=Funciona.objects.filter(categoria=x,ide=origen,privacidad='publico').order_by(order,fecha)
	else:
		capas=Funciona.objects.filter(categoria=x,privacidad='publico').order_by(order,fecha)

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

	return render(request,'categoria.php',{'content':cap,'descripcion':descripcion.descripcion,'cat':x,'order':order,'fecha':fecha,'origen':origen,'page_range': page_range,'max_index':max_index})


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
	if len(request.POST)!=0:
		if (request.POST['userName'] and request.POST['userPassword']):
			if Usuarios.objects.filter(usuario=request.POST['userName']).exists():
				m=Usuarios.objects.get(usuario=request.POST['userName'])
				if m.password == request.POST['userPassword']:
					request.session['user_name']=m.usuario
					request.session.modified = True
					capas=Funciona.objects.filter(ide=m.centro).order_by('name')
					total=Funciona.objects.count()
					total_centro=Funciona.objects.filter(ide=m.centro).count()
					return render(request,'admin.php',{'content':capas,'form':form,'total':total,'t_centro':total_centro,'centro':m.centro,'sesion':m.usuario})
				else:
					return HttpResponse("Clave incorrecta")
			else:
				return HttpResponse("No existe usuario")
	else:
		return render(request,'login.php')

def sesion(request):

	m=Usuarios.objects.get(usuario=request.POST['userName'])
	if m.password == request.POST['userPassword']:
		request.session['user_name']=m.usuario
		return HttpResponse("Ingreso")
	else:
		return HttpResponse("no ingreso")