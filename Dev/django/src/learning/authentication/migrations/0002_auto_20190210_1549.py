# Generated by Django 2.0.7 on 2019-02-10 15:49

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('authentication', '0001_initial'),
    ]

    operations = [
        migrations.AlterModelTable(
            name='users',
            table='user_accounts',
        ),
    ]