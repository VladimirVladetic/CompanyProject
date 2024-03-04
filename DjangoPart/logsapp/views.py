from django.shortcuts import get_object_or_404
from rest_framework import viewsets
from rest_framework.response import Response
from .serializer import LogsSerializer
from .models import Logs
from .services import LogsStatisticsService, LogsService
from rest_framework import status
from datetime import time

# Create your views here.
class LogsViewSet(viewsets.ViewSet):

    # @action(detail=False, methods=['get'])
    def list(self, request):
        service = LogsService()
        return service.listLogs()
    
    # @action(detail=True, methods=['get'])
    def retrieve(self, request, pk=None):
        service = LogsService()
        return service.retrieveLog(pk)
    
    # @action(detail=False, methods=['post'])
    def create(self, request):
        title = request.data.get('title')
        desc = request.data.get('desc')
        attempts = request.data.get('attempts')
        service = LogsService()
        
        return service.createLog(title,desc,attempts)
    
class LogsStatisticsViewSet(viewsets.ViewSet):  

    def list(self, request):
        service = LogsStatisticsService
        start_time = time(7, 0)
        end_time = time(15, 0)
            
        response_data = {
        'Percentage of logs in 2024': service.transformPercentage(service.get2024Logs()),
        'Percentage of logs in February': service.transformPercentage(service.getFebruaryLogs()),
        'Percentage of logs in March': service.transformPercentage(service.getMarchLogs()),
        'Percentage of logs during work hours': service.transformPercentage(service.getWorkingHoursLogs(start_time, end_time)),
        'Percentage of logs during non work hours': service.transformPercentage(service.getNonWorkingHoursLogs(start_time, end_time)),
        } 
        return Response(response_data)

