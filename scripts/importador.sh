#!/bin/bash
clear

cd /home/plataforma/plataforma-datos-django

service nginx restart
python manage.py importar_cedeus
python manage.py importar_ocuc
python manage.py importar_cigiden
