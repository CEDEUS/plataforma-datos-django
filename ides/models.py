from __future__ import unicode_literals

from django.db import models
from django import forms
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
	def __unicode__(self):
		return self.name

class Privacidad(models.Model):
	nombre=models.CharField(max_length=200,null=True)
	privacidad=models.CharField(max_length=200,default='',null=True)
	ide=models.CharField(max_length=200,default='',null=True)

class Categorias(models.Model):
	nombre=models.CharField(primary_key=True,max_length=200)
	descripcion=models.CharField(max_length=500)
	imagen = models.ImageField(null=True,blank=True)

class Usuarios(models.Model):
	usuario=models.CharField(primary_key=True,max_length=200)
	password=models.CharField(max_length=200,default='',null=True)
	centro=models.CharField(max_length=200)
	correo=models.CharField(max_length=200)
	perfil=models.CharField(max_length=200)

class UrlPendientes(models.Model):
	user = models.CharField(max_length=200)
	password = models.CharField(max_length=200)
	ide = models.CharField(max_length=200)
	workspace = models.CharField(max_length=200)
	datastore = models.CharField(max_length=200)
	layer = models.CharField(max_length=400)
	pendiente = models.BooleanField(default=True)
