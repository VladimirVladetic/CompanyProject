from django.test import TestCase
from .models import Logs
from django.core.exceptions import ValidationError
# Create your tests here.

class LogTestCase(TestCase):
    def setUp(self):
        Logs.objects.create(title = "1", desc = "Unit test 1", attempts = 10)
        Logs.objects.create(title = "2", desc = "Unit test 2", attempts = 5)
    
    def test_logs(self):
        first_log = Logs.objects.get(title = "1")
        self.assertEqual(first_log.title, "1")
        # self.assertEqual(first_log.title, "2")

    def test_attempts_validator(self):
        log = Logs.objects.create(title = 'Fail', desc = 'Unit test 3', attempts=0)
        self.assertRaises(ValidationError, log.full_clean)
            
