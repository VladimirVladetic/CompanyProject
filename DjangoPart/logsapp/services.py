from .serializer import LogsSerializer
from django.shortcuts import get_object_or_404
from .models import Logs
from datetime import datetime
from rest_framework.response import Response
from rest_framework import status
from django.core.exceptions import ValidationError

class LogsService():

    def listLogs(self):
        queryset = Logs.objects.all()
        serializer = LogsSerializer(queryset, many=True)
        return serializer.data

    def retrieveLog(self, pk):
        if pk is None:
            return Response({"errors": "Bad request"}, status=status.HTTP_400_BAD_REQUEST)
        log = get_object_or_404(Logs, pk=pk)
        serializer = LogsSerializer(log)
        return serializer.data


class LogsStatisticsService():

    def transformPercentage(logs):
        logs *= 100
        logs = f"{logs:.2f}%"
        return logs
    
    def get2024Logs():
        querysetall = Logs.objects.all()
        queryset = Logs.objects.all().filter(time__year=datetime.now().year)
        return (queryset.count() / querysetall.count())
    
    def getFebruaryLogs():
        querysetall = Logs.objects.all()
        queryset = [log for log in querysetall if log.time.month == 2] 
        return (len(queryset) / querysetall.count())
    
    def getMarchLogs():
        querysetall = Logs.objects.all()
        queryset = [log for log in querysetall if log.time.month == 3]
        return (len(queryset) / querysetall.count())
    
    def getWorkingHoursLogs(start_time, end_time):
        querysetall = Logs.objects.all()
        queryset = [log for log in querysetall if start_time <= log.time.time() <= end_time]
        return (len(queryset) / querysetall.count())
    
    def getNonWorkingHoursLogs(start_time, end_time):
        querysetall = Logs.objects.all()
        queryset = [log for log in querysetall if start_time <= log.time.time() <= end_time]
        return ((querysetall.count() - len(queryset)) / querysetall.count())
    
    def getAttemptsForUser(username):
        querysetall = Logs.objects.all()
        queryset = querysetall.filter(desc__startswith=username)

        max_attempts_log = queryset.order_by('-attempts').first()
        min_attempts_log = queryset.order_by('attempts').first()

        attempts = 0

        for log in queryset:
            attempts += log.attempts

        response_data = {
            'Total number of attempts for user': attempts,
            'Average number of attempts per login': f"{(attempts / len(queryset)):.2f}",
            'Least attempts per login': min_attempts_log.attempts,
            'Most attempts per login': max_attempts_log.attempts,
        }

        return response_data