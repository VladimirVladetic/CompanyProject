from rest_framework import viewsets
from django.shortcuts import get_object_or_404
from rest_framework.response import Response
from .services import LogsStatisticsService
from datetime import time
from rest_framework import status
from django.core.exceptions import ValidationError
from .serializer import LogsSerializer
from .models import Logs

# Create your views here.
class LogsViewSet(viewsets.ViewSet):

    # @action(detail=False, methods=['get'])
    def list(self, request):
        queryset = Logs.objects.all()
        serializer = LogsSerializer(queryset, many=True)
        return Response(serializer.data, status=status.HTTP_200_OK)
    
    # @action(detail=True, methods=['get'])
    def retrieve(self, request, pk=None):
        if pk is None:
            return Response({"errors": "Bad request"}, status=status.HTTP_400_BAD_REQUEST)
        log = get_object_or_404(Logs, pk=pk)
        serializer = LogsSerializer(log)
        return Response(serializer.data, status=status.HTTP_200_OK)
    
    # @action(detail=False, methods=['post'])
    def create(self, request):
        title = request.data.get('title')
        desc = request.data.get('desc')
        attempts = request.data.get('attempts')

        if title is None or title == "" or desc is None or desc == "":
            return Response({"error": "Title and desc are required."}, status=status.HTTP_400_BAD_REQUEST)

        log = Logs(title=title, desc=desc, attempts=attempts)

        try:
            log.full_clean()
        except ValidationError as e:
            return Response(e, status=status.HTTP_406_NOT_ACCEPTABLE)
        else:
            log.save()

        serializer = LogsSerializer(log)
        
        return Response(serializer.data, status=status.HTTP_201_CREATED)
    
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
    
    def retrieve(self, request, username=None):
        service = LogsStatisticsService
        response_data = service.getAttemptsForUser(username)
        return Response(response_data, status=status.HTTP_200_OK)

