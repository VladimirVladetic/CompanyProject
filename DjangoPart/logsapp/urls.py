from django.urls import path

from . import views

app_name = 'logsapp'

urlpatterns = [
    path('storeLogs/', views.LogsViewSet.as_view({'post': 'storeLogs'}), name='store_logs')
]