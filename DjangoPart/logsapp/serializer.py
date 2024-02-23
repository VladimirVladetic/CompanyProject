from rest_framework import serializers

class LogsSerializer(serializers.Serializer):
    title = serializers.CharField(max_length = 50)
    slug = serializers.SlugField()
    desc = serializers.CharField(max_length = 500)
    time = serializers.DateTimeField()
    
