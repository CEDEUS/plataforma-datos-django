# -*- coding: utf-8 -*-
# Generated by Django 1.9 on 2017-05-08 11:07
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('ides', '0011_privacidad_ide'),
    ]

    operations = [
        migrations.AddField(
            model_name='categorias',
            name='imagen',
            field=models.ImageField(blank=True, null=True, upload_to=b''),
        ),
    ]
