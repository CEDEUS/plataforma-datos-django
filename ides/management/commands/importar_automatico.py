#Importador automatico de capas CEDEUS, OCUC y CIGIDEN.
#Todos los dias a la hora en variable hora

from django.core.management.base import BaseCommand, CommandError
import os,sys
import urllib2,base64,json,time
from ides.models import Categorias,Funciona,Privacidad
from ides.capa import info_capas,sube_capas,borrar_capas
from datetime import datetime,timedelta
from django.utils import timezone

class Command(BaseCommand):

	help = "Importa capas a base de datos"

	def handle(self, *app_labels,**options):
			try:
				date=timezone.now()
				t_end = time.time() + 60 * 1
				contador=0
				now=datetime.now()
				hora = now.replace(hour=17, minute=30, second=0,microsecond=0)
				now_time=now.time()
				os.system('echo "tiempo %s "' % now_time)
				os.system('echo "tiempo %s "' % hora.time())
				str(sys.argv)
				flag = 1
				while flag:
						#time.sleep(10)
						now=datetime.now()
						now_time=now.time()
						now_time=now.replace(microsecond=0)
						os.system('echo "tiempo %s "' % now_time.time())
						if now_time.time() == hora.time():
								
								borrar_capas(Funciona)

								ide_db='CEDEUS'					
								os.system('echo "descargando informacion %s"' % ide_db)					
								user="ide"
								password="password"
								ide="http://datos.cedeus.cl"
								subir=sube_capas(user,password,ide,ide_db)
								os.system('echo "info %s descargada"' % ide_db)

								ide_db="OCUC"					
								os.system('echo "descargando informacion %s"' % ide_db)
								user="admin"
								password="geoserver"
								ide="http://ide.ocuc.cl"
								subir=sube_capas(user,password,ide,ide_db)
								os.system('echo "info %s descargada"' % ide_db)

								ide_db='CIGIDEN'					
								os.system('echo "descargando informacion %s"' % ide_db)					
								user="admin"
								password="geoserver"
								ide="http://ide.cigiden.cl"
								subir=sube_capas(user,password,ide,ide_db)
								os.system('echo "info %s descargada"' % ide_db)
  								flag = 0
				

			except ValueError:
					os.system('error: '+ValueError)
					pass