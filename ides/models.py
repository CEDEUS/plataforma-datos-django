from __future__ import unicode_literals

from django.db import models
from django.utils import timezone

# Create your models here.

class Funciona(models.Model):
	titulo=models.CharField(max_length=200,null=True)
	categoria=models.CharField(max_length=200,null=True)
	fecha=models.DateTimeField(default=timezone.now,blank=True)
	keys=models.CharField(max_length=300,null=True)
	abstract=models.CharField(max_length=1000,null=True)
	name=models.CharField(max_length=200,default='',null=True)
	workspace=models.CharField(max_length=200,default='',null=True)
	ide=models.CharField(max_length=200,default='',null=True)
	privacidad=models.CharField(max_length=200,default='',null=True)

class Privacidad(models.Model):
	nombre=models.CharField(max_length=200,null=True)
	privacidad=models.CharField(max_length=200,default='',null=True)

class Categorias(models.Model):
	nombre=models.CharField(primary_key=True,max_length=200)
	descripcion=models.CharField(max_length=200)

class Usuarios(models.Model):
	usuario=models.CharField(primary_key=True,max_length=200)
	centro=models.CharField(max_length=200)
	correo=models.CharField(max_length=200)
	perfil=models.CharField(max_length=200)








