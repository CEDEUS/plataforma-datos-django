# -*- coding: utf-8 -*-
# Generated by Django 1.9 on 2017-02-04 22:51
from __future__ import unicode_literals

from django.db import migrations
from django.contrib.postgres.operations import UnaccentExtension

class Migration(migrations.Migration):

    dependencies = [
        ('ides', '0001_initial'),
    ]

    operations = [
	UnaccentExtension()
    ]