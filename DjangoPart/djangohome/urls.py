"""
URL configuration for djangohome project.

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/5.0/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path, include
from logsapp.views import LogsViewSet, LogsStatisticsViewSet
from rest_framework.routers import DefaultRouter

logsrouter = DefaultRouter()
statisticsrouter = DefaultRouter()

logsrouter.register("", LogsViewSet, basename="logs")
statisticsrouter.register("", LogsStatisticsViewSet, basename="statistics")

urlpatterns = [
    path('admin/', admin.site.urls),
    path('logs/', include(logsrouter.urls)),
    path('statistics/<str:username>/', LogsStatisticsViewSet.as_view({'get': 'retrieve'}), name='statistics-username'),
    path('statistics/', include(statisticsrouter.urls)),
]
