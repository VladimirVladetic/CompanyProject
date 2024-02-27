from django.urls import path

from . import views

app_name = 'logsapp'

urlpatterns = [
    path('storeLogs/', views.LogsViewSet.as_view({'post': 'storeLogs'}), name='store_logs'),
    path('listLogs/', views.LogsViewSet.as_view({'get': 'list'}), name='list_logs'),
    path('retrieveLogs/', views.LogsViewSet.as_view({'get', 'retrieve'}), name='retrieve_logs')
]