from rest_framework import serializers

class LogsSerializer(serializers.Serializer):
    title = serializers.CharField(max_length = 50)
    desc = serializers.CharField(max_length = 500)
    time = serializers.DateTimeField()
    attempts = serializers.IntegerField()
    
