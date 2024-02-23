from django.urls import path

from . import views

app_name = 'logsapp'

urlpatterns = [
    path('getLogs/', views.LogsViewSet.list),
]