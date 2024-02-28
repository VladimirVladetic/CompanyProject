from django.db import models
from .validators import validate_attempts

# Create your models here.
class Logs(models.Model):
    title = models.CharField(max_length = 50)
    desc = models.CharField(max_length = 500)
    time = models.DateTimeField(auto_now_add=True)
    attempts = models.IntegerField(validators=[validate_attempts])

    def __str__(self):
        return self.title
    
    # def __init__(self, title, desc):
    #     super(Logs, self).__init__()
    #     self.title = title
    #     self.desc = desc
    #     self.time = datetime.now()
        