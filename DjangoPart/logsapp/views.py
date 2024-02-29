from django.shortcuts import get_object_or_404
from rest_framework import viewsets
from rest_framework.response import Response
from .serializer import LogsSerializer
from .models import Logs
from rest_framework.decorators import action
from rest_framework import status
from django.core.exceptions import ValidationError
from datetime import time, datetime
from django.db.models import Q

# Create your views here.
class LogsViewSet(viewsets.ViewSet):

    # @action(detail=False, methods=['get'])
    def list(self, request):
        queryset = Logs.objects.all()
        serializer = LogsSerializer(queryset, many=True)
        return Response(serializer.data)
    
    # @action(detail=True, methods=['get'])
    def retrieve(self, request, pk=None):
        if pk is None:
            return Response({"errors": "Bad request"}, status=status.HTTP_400_BAD_REQUEST)
        # log = Logs.objects.get(pk=pk)
        log = get_object_or_404(Logs, pk=pk)
        serializer = LogsSerializer(log)
        return Response(serializer.data)
    
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
            return Response({"errors": "Invalid number of attempts."}, status=status.HTTP_406_NOT_ACCEPTABLE)
        else:
            log.save()

        serializer = LogsSerializer(log)
        
        return Response(serializer.data, status=status.HTTP_201_CREATED)
    
class LogsStatisticsViewSet(viewsets.ViewSet):  

    def list(self, request):
        querysetall = Logs.objects.all()
        start_time = time(8, 0)
        end_time = time(16, 0)

        
        queryset1 = Logs.objects.all().filter(time__year=datetime.now().year)
        logs2024 = (queryset1.count() / querysetall.count())
        logs2024 *= 100
        logs2024 = f"{logs2024:.2f}%"

        queryset2 = [log for log in querysetall if log.time.month == 2]
        logsfebruary = (len(queryset2) / querysetall.count())
        logsfebruary *= 100
        logsfebruary = f"{logsfebruary:.2f}%"

        queryset3 = [log for log in querysetall if log.time.month == 3]
        logsmarch = (len(queryset3) / querysetall.count())
        logsmarch *= 100
        logsmarch = f"{logsmarch:.2f}%"

        queryset4 = [log for log in querysetall if start_time <= log.time.time() <= end_time]
        logsworkhours = (len(queryset4) / querysetall.count())
        logsworkhours *= 100
        logsworkhours = f"{logsworkhours:.2f}%"

        logsnotworkhours = ((querysetall.count() - len(queryset4)) / querysetall.count())
        logsnotworkhours *= 100
        logsnotworkhours = f"{logsnotworkhours:.2f}%"
            
        response_data = {
        'Percentage of logs in 2024': logs2024,
        'Percentage of logs in February': logsfebruary,
        'Percentage of logs in March': logsmarch,
        'Percentage of logs during work hours': logsworkhours,
        'Percentage of logs during non work hours': logsnotworkhours,
        } 
        return Response(response_data)

