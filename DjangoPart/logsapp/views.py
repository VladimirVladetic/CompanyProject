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

    @action(detail=False, methods=['get'])
    def list(self, request):
        print("halo")
        queryset = Logs.objects.all()
        print(queryset)
        serializer = LogsSerializer(queryset, many=True)
        return Response(serializer.data)
    
    @action(detail=False, methods=['get'])
    def retrieve(self, request, pk=None):
        queryset = Logs.objects.all()
        log = get_object_or_404(queryset, pk=pk)
        serializer = LogsSerializer(log)
        return Response(serializer.data)
    
    @action(detail=False, methods=['post'])
    def storeLogs(self, request):
        title = request.data.get('title')
        desc = request.data.get('desc')

        # print(title)
        # print(desc)

        if title is None or title == "" or desc is None or desc == "":
            return Response({"error": "Title and desc are required."}, status=status.HTTP_400_BAD_REQUEST)
        
        log = Logs(title=title, desc=desc)
        log.save()

        serializer = LogsSerializer(log)
        # if not serializer.is_valid():
        #     return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)
        
        return Response(serializer.data, status=status.HTTP_201_CREATED)
        
        # return Response(status=status.HTTP_200_OK)

        
