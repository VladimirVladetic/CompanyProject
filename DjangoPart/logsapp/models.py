from django.db import models
from datetime import datetime

# Create your models here.
class Logs(models.Model):
    title = models.CharField(max_length = 50)
    desc = models.CharField(max_length = 500)
    time = models.DateTimeField()

    def __str__(self):
        return self.title
    
    def __init__(self, title, desc):
        super(Logs, self).__init__()
        self.title = title
        self.desc = desc
        self.time = datetime.now()

    @classmethod
    def create(cls, title, desc):
        log = Logs(title=title, desc=desc)
        return log
        