from django.db import models

# Create your models here.
class Logs(models.Model):
    title = models.CharField(max_length = 50)
    slug = models.SlugField()
    desc = models.TextField()
    time = models.DateTimeField()

    def __str__(self):
        return self.title
        