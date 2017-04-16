from django.core.management.base import BaseCommand, CommandError
import os
import urllib2,base64,json
from ides.models import Categorias,Funciona
from ides.capa import info_capas,sube_capas

class Command(BaseCommand):

	help = "Importa capas a base de datos"

	def handle(self, *app_labels,**options):
			try:

					ide_db='cedeus'					
					os.system('echo "descargando informacion %s"' % ide_db)					
					user="ide"
					password="password"
					ide="http://datos.cedeus.cl"
					subir=sube_capas(user,password,ide,ide_db)
					os.system('echo "info %s descargada"' % ide_db)

					ide_db="ocuc"					
					os.system('echo "descargando informacion %s"' % ide_db)
					user="admin"
					password="geoserver"
					ide="http://ide.ocuc.cl"
					subir=sube_capas(user,password,ide,ide_db)
					os.system('echo "info %s descargada"' % ide_db)

					ide_db='cigiden'					
					os.system('echo "descargando informacion %s"' % ide_db)					
					user="admin"
					password="geoserver"
					ide="http://ide.cigiden.cl"
					subir=sube_capas(user,password,ide,ide_db)
					os.system('echo "info %s descargada"' % ide_db)

			except ValueError:
					os.system('error: '+ValueError)
					pass