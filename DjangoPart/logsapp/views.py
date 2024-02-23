from django.shortcuts import render
from django.shortcuts import get_object_or_404
from rest_framework import viewsets
from rest_framework.response import Response
from .serializer import LogsSerializer
from .models import Logs
from rest_framework.decorators import action
from rest_framework import status

# Create your views here.
class LogsViewSet(viewsets.ViewSet):
    def list(self, request):
        queryset = Logs.objects.all()
        serializer = LogsSerializer(queryset, many=True)
        return Response(serializer.data)
    
    def retrieve(self, request, pk=None):
        queryset = Logs.objects.all()
        log = get_object_or_404(queryset, pk=pk)
        serializer = LogsSerializer(log)
        return Response(serializer.data)
    
    @action(detail=False, methods=['post'])
    def storeLogs(self, request):
        title = request.data.get('title')
        desc = request.data.get('desc')
        log = Logs(title=title, desc=desc)
        log.save()
        serializer = LogsSerializer(data=request.data)
        return Response(serializer.data, status=status.HTTP_201_CREATED)
