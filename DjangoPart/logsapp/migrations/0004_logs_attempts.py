# Generated by Django 5.0.2 on 2024-02-28 12:55

import logsapp.validators
from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('logsapp', '0003_alter_logs_time'),
    ]

    operations = [
        migrations.AddField(
            model_name='logs',
            name='attempts',
            field=models.IntegerField(default=1, validators=[logsapp.validators.validate_attempts]),
            preserve_default=False,
        ),
    ]
