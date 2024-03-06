from .models import Logs
from datetime import datetime

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