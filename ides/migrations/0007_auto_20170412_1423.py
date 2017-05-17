# -*- coding: utf-8 -*-
# Generated by Django 1.9 on 2017-04-12 14:23
from __future__ import unicode_literals

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('ides', '0006_auto_20170216_1657'),
    ]

    operations = [
        migrations.CreateModel(
            name='Usuarios',
            fields=[
                ('usuario', models.CharField(max_length=200, primary_key=True, serialize=False)),
                ('centro', models.CharField(max_length=200)),
                ('correo', models.CharField(max_length=200)),
                ('perfil', models.CharField(max_length=200)),
            ],
        ),
        migrations.AddField(
            model_name='funciona',
            name='privacidad',
            field=models.CharField(default='', max_length=200, null=True),
        ),
    ]
