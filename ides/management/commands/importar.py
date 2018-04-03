from django.core.management.base import BaseCommand, CommandError
import os
import logging
import urllib2,base64,json
from ides.models import Categorias,Funciona
from datetime import datetime,timedelta
from ides.capa import info_capas,sube_capas,borrar_capas

class Command(BaseCommand):

	help = "Importa capas a base de datos"

	def handle(self, *app_labels,**options):
			try:
					LOG_FILENAME = 'importador.log'
					logging.basicConfig(filename=LOG_FILENAME,level=logging.DEBUG)
					
					#zona horaria CHILE invierno
					now=datetime.now()- timedelta(hours=4)
					now_time=now.time()

					borrar_capas(Funciona)
					ide_db='CEDEUS'					
					os.system('echo "descargando informacion %s"' % ide_db)					
					user="ide"
					password="password"
					ide="http://datos.cedeus.cl"
					subir=sube_capas(user,password,ide,ide_db)
					os.system('echo "info %s descargada"' % ide_db)
					logging.info("info %s descargada, %s",ide_db,now_time)

					ide_db="OCUC"					
					os.system('echo "descargando informacion %s"' % ide_db)
					user="admin"
					password="geoserver"
					ide="http://ide.ocuc.cl"
					subir=sube_capas(user,password,ide,ide_db)
					os.system('echo "info %s descargada"' % ide_db)
					logging.info("info %s descargada, %s",ide_db,now_time)

					ide_db='CIGIDEN'					
					os.system('echo "descargando informacion %s"' % ide_db)					
					user="admin"
					password="geoserver"
					ide="http://ide.cigiden.cl"
					subir=sube_capas(user,password,ide,ide_db)
					os.system('echo "info %s descargada"' % ide_db)
					logging.info("info %s descargada, %s",ide_db,now_time)

			except ValueError:
					LOG_FILENAME = 'importador.log'
					logging.basicConfig(filename=LOG_FILENAME,level=logging.DEBUG)
					
					now=datetime.now()- timedelta(hours=4)
					now_time=now.time()

					os.system('error: '+ValueError)
					logging.error("Error: %s time:%s",ValueError,now_time)
					pass