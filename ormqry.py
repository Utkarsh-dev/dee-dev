import sys
import django
django.setup()

import dumper
# from tilib.utilsdb import transaction

from ti_webapp.models import *
from django.db.models import Q

#qs = EMaster.objects.all()
#qs = EMaster.objects.all()[:2]
#qs = EMaster.objects.all()[3:3+5]
#qs = EMaster.objects.all().order_by('email')[:2]
#qs = EMaster.objects.all().order_by('-email')[:2]

#qs = EMaster.objects.all().values('email_key','email')
#qs = EMaster.objects.all().values('email_key','email').filter(email='amit.a@test.com')
#qs = EMaster.objects.all().values('email_key','email').filter(email__contains = 'amit.a@test.com')
#qs = EMaster.objects.all().values('email_key','email') \
#        .filter(email__contains = '%')

#qs = EMaster.objects.all().values('email_key','email').filter(email__startswith = 'amit.a')
#qs = EMaster.objects.all().values('email_key','email').filter(email__in = ['amit.a@test.com','vipin.kumar@test.com'])
#qs = EMaster.objects.all().values('email_key','email').filter(email__regex=r'^amit.a')

#qs = EMaster.objects.all().values('email_key','email').filter(email__startswith='vipin.kumar') \
#    .exclude(email__endswith='@gmail.com')


#qs = EMaster.objects.all().values('email_key','email'). \
#filter(Q(email__startswith='vipin.kumar')|Q(email='amit.a@test.com'))

#qs = EMaster.objects.all().values('email_key','email'). \
#filter((Q(email__startswith='amit.a')&~Q(email='amit.a@test.com'))|Q(email__startswith='amit.a'))

#qs = EMaster.objects.all().values('email_key','email'). \
#filter(Q(email__startswith='vipin.kumar')|Q(email='amit.a@test.com'),email__startswith='vipin.kumar' )

#### UNION #####
#qs1= EMaster.objects.filter(email_key__lt=100).values('email')
#qs2= EMaster.objects.filter(email_key__lt=500,email_key__gt=300).values('email')
#qs = qs1.union(qs2)

#qs[0]
#print(qs1.query)
#print(qs2.query)

##### values , values_list, only ##############
#qs = EMaster.objects.all().values('email_key','email').filter(email_key__lte=10)
#for obj in qs:
#    print(obj['email_key'], obj['email'])
#    print(obj)

#qs = EMaster.objects.all().values_list('email_key','email').filter(email_key__lt=10)
#for obj in qs:
#    print(obj)
#    print(email_key, email)

#qs = EMaster.objects.only('email').filter(email_key__lt=10)
#qs = ProfileMaster.objects.only('country_code')[:1]
#for obj in qs:
#    print(obj.co_name)
#    print(type(obj))
#    print(obj.pk, obj.email_key, obj.email)

########## JOINS #################
# Parent-table: Parent
# Child-table: Child
# .values() ======> select clause equivalent
# .filter() ======> where_clause equivalent

# Queries using EMaster
#### LEFT OUTER JOIN #########
#qs = Parent.objects.all().values("email", "accountemails_email_key")[:5]
#qs = Parent.objects.all().values("email", "accountemails_email_key__userid")[:5]
#qs=Parent.objects.all().values("email", "accountemails_email_key").filter(email='amit.a@test.com')[:5]
#qs=Parent.objects.all().filter(email='amit.a@test.com').values("email", "accountemails_email_key")[:5]

##### INNER JOIN ############
#qs = Parent.objects.filter(accountemails_email_key__isnull=False) \
#      .values('email','accountemails_email_key__userid')[:5]

#qs=Parent.objects.all().filter(accountemails_email_key__userid=9382305) \
# .values("email", "accountemails_email_key")

#qs=Parent.objects.all().filter(email='amit.a@test.com',accountemails_email_key__isnull=False) \
# .values("email", "accountemails_email_key")

#qs=Parent.objects.all().filter(email='amit.a@test.com',accountemails_email_key__userid=9382305) \
# .values("email", "accountemails_email_key")


# Queries using Child
##### INNER JOIN ############
#qs = Child.objects.all().select_related().values('userid__username','email_key__email')[:5]
# qs = Child.objects.all().select_related('email_key').values('email_key__email')[:5]
# qs = Child.objects.all().filter(email_key__email='amit.a@test.com').values('email_key__email')[:5]
# qs = Child.objects.all().filter(userid=9250376).values('email_key__email')[:5]
# qs = Child.objects.all().filter(email_key__email='amit.a@test.com').values('userid')[:5]
# qs = Child.objects.all().filter(userid=9250376).values('userid')[:5]



####### SUB QUERIES ############
from django.db.models import Subquery

#sub query example
#subquery = Subquery(Child.objects.filter(ifdefault = True).values('email_key'))
#qs = Parent.objects.filter(email_key__in=subquery).values('email')[:5]













#qs = Parent.objects.filter(accountemails_email_key__ifdefault=True) \
#.values_list('accountemails_email_key__ifdefault','accountemails_email_key__userid' )[:3003]
#if qs:
#    pass

#for obj in qs:
#    print(obj)
#
#qs =  Parent.objects.filter()[:3001]
#for obj in qs:
#    selfji = obj.accountemails_email_key.filter(ifdefault=True).all()
#    for x in selfji:
#        print(x.ifdefault)



# qs = Parent.objects.countass()


# p = ProfileMaster.objects.get(pk=340240)
# p = ProfileMaster.objects.get(pk=3522994)
# print(ProfileMaster.check_duplicate_self(phone_no='27660526/27660028',fax='27660526'))

# qs = Parent.objects.values('email','accountemails_email_key__userid')
# qs = Parent.objects.filter(accountemails_email_key__userid=7338260).values('email')
#qs = Child.objects.filter(userid = 7338260).values('email_key__email')

# qs = Parent.objects.all().values('email', 'accountemails_email_key')

# qs = Parent.objects.filter(email='amit.a@test.com', email_key__accountemails_email_key__isnull = True)

#print(qs.count())
print(qs.query)
