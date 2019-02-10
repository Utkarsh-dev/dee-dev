from django.db import models
from django.utils import timezone

class Users(models.Model):
    userid   = models.AutoField(primary_key=True)
    username = models.CharField(max_length=200,default="",null=False)
    email    = models.CharField(max_length=200,default="",null=False)
    password = models.CharField(max_length=200,default="",null=False)
    created  = models.DateTimeField(editable=False,default=timezone.now)
    class Meta:
        db_table = "user_accounts"

