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
					LOG_FILENAME = 'cedeus.log'
					flag=False
					logging.basicConfig(filename=LOG_FILENAME,level=logging.DEBUG)
					
					#zona horaria CHILE invierno
					now=datetime.now()- timedelta(hours=4)
					now_time=now.date()

					ide_db='CEDEUS'					
					os.system('echo "descargando informacion %s"' % ide_db)					
					user="admin"
					password="geoserver"
					ide="http://datos.cedeus.cl"

					request=urllib2.Request(ide)
					base64string=base64.b64encode('%s:%s' %(user,password))
					request.add_header("Authorization","Basic %s" % base64string)
					request.add_header("Authorization","Basic %s" % base64string)

					try:
						result=urllib2.urlopen(request)
						flag=True

					except urllib2.HTTPError, e:
						logging.error('HTTPError = ' + str(e.code))
					except urllib2.URLError, e:
						logging.error('URLError = ' + str(e.reason))
					except httplib.HTTPException, e:
						logging.error('HTTPException')
					except Exception:
						import traceback
						logging.error('generic exception: ' + traceback.format_exc())

					if flag:
						borrar_capas(ide_db)
						subir=sube_capas(user,password,ide,ide_db)
						os.system('echo "info %s descargada"' % ide_db)
						logging.info("info %s descargada, %s",ide_db,now)

			except ValueError:
					LOG_FILENAME = 'cedeus.log'
					logging.basicConfig(filename=LOG_FILENAME,level=logging.DEBUG)
					
					now=datetime.now()- timedelta(hours=4)
					now_time=now.time()

					os.system('error: '+ValueError)
					logging.error("Error: %s time:%s",ValueError,now)
					pass