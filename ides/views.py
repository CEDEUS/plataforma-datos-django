from django.shortcuts import render_to_response,render
from django.http import HttpResponse,HttpResponseRedirect
from django.views.decorators.clickjacking import xframe_options_exempt
from ides.models import Categorias,Funciona,Privacidad,Usuarios
from ides.forms import PrivForm,SearchForm
from django.db.models import Q,Sum
from datetime import datetime

#from codigo import suma
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
    return render_to_response('index.php')

@xframe_options_exempt
def buscador(request):
	x=''
	resultado=Funciona.objects.all().order_by('-fecha')

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
				resultado=Funciona.objects.filter(titulo__unaccent__icontains=x,categoria=categoria,ide=origen).order_by(fecha,orden)

			elif categoria != 'CATEGORIA' and origen == 'ORIGEN':
				resultado=Funciona.objects.filter(titulo__unaccent__icontains=x,categoria=categoria).order_by(fecha,orden)
			
			elif categoria == 'CATEGORIA' and origen != 'ORIGEN':
				resultado=Funciona.objects.filter(titulo__unaccent__icontains=x,ide=origen).order_by(fecha,orden)

			else:
				resultado=Funciona.objects.filter(titulo__unaccent__icontains=x).order_by(fecha,orden)
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
				resultado=Funciona.objects.filter(categoria=categoria,ide=origen).order_by(fecha,orden)

			elif categoria != 'CATEGORIA' and origen == 'ORIGEN':
				resultado=Funciona.objects.filter(categoria=categoria).order_by(fecha,orden)
			
			elif categoria == 'CATEGORIA' and origen != 'ORIGEN':
				resultado=Funciona.objects.filter(ide=origen).order_by(fecha,orden)

			else:
				resultado=Funciona.objects.all().order_by(fecha,orden)



	return render(request,'buscador.php',{'content':resultado,'bus':x})

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
	
	capas=Funciona.objects.all().order_by('name')
	total=Funciona.objects.count()
	total_cedeus=Funciona.objects.filter(ide='CEDEUS').count()
	total_ocuc=Funciona.objects.filter(ide='OCUC').count()
	total_cigiden=Funciona.objects.filter(ide='CIGIDEN').count()


	if request.method == 'POST':
		# create a form instance and populate it with data from the request:

		if 'change' in request.POST:
			form = PrivForm(request.POST)
		
		# check whether it's valid:
			if form.is_valid():

				nombre_capa=form.cleaned_data['nombre']
				privacidad_capa=form.cleaned_data['privacidad']
				if Privacidad.objects.filter(nombre=nombre_capa).exists():
					Privacidad.objects.filter(nombre=nombre_capa).update(privacidad=privacidad_capa)
					Funciona.objects.filter(name=nombre_capa).update(privacidad=privacidad_capa)
				else:
					Privacidad.objects.create(nombre=nombre_capa,privacidad=privacidad_capa)
					Funciona.objects.filter(name=nombre_capa).update(privacidad=privacidad_capa)
			
			
				return render(request,'admin.php',{'content':capas,'form':form,'total':total,'t_cedeus':total_cedeus,'t_ocuc':total_ocuc,'t_cigiden':total_cigiden})
		else:
			form = SearchForm(request.POST)
			if form.is_valid():
				find=form.cleaned_data['find']
				capa=Funciona.objects.filter(name__unaccent__icontains=find)
				return render(request,'admin.php',{'content':capa,'form':form,'total':total,'t_cedeus':total_cedeus,'t_ocuc':total_ocuc,'t_cigiden':total_cigiden})
	# if a GET (or any other method) we'll create a blank form
	else:
		form = PrivForm()
	return render(request,'admin.php',{'content':capas,'form':form,'total':total,'t_cedeus':total_cedeus,'t_ocuc':total_ocuc,'t_cigiden':total_cigiden})

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
		capas=Funciona.objects.filter(categoria=x,ide=origen).order_by(fecha,order)
	else:
		capas=Funciona.objects.filter(categoria=x).order_by(fecha,order)

	
	return render(request,'categoria.php',{'content':capas,'cat':x})


def codigo(request):    
    variable=100
    return render(request,'codigo.php',{'content':['la variable vale',variable]})
# Create your views here.
