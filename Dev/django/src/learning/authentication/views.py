from django.http import HttpResponse
from django.template import loader
from django.shortcuts import render


def index(request):
    #template = loader.get_template('auth/index.html')
    #return HttpResponse(template.render(context, request))
    #METHDO 2 : USING Render
    context = { 'user': 'Utkarsh' }
    return render(request, 'auth/index.html', context)

def register(request):
    #template = loader.get_template('auth/index.html')
    #return HttpResponse(template.render(context, request))
    #METHDO 2 : USING Render
    context = { 'user': 'Utkarsh' }
    return render(request, 'auth/register.html', context)