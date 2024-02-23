from django.db import models
from datetime import datetime

# Create your models here.
class Logs(models.Model):
    title = models.CharField(max_length = 50)
    slug = models.SlugField()
    desc = models.CharField(max_length = 500)
    time = models.DateTimeField()

    def __str__(self):
        return self.title
    
    def __init__(self, title, slug, desc, time):
        self.title = title
        self.slug = slug
        self.desc = desc
        self.time = datetime.now()
        