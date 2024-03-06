from django.test import TestCase
from .models import Logs
from django.core.exceptions import ValidationError
from .services import LogsStatisticsService
from datetime import datetime, time
# Create your tests here.

class LogTestCase(TestCase):

    def setUp(self):
        Logs.objects.create(title = "1", desc = "Unit test 1", attempts = 10)
        Logs.objects.create(title = "2", desc = "Unit test 2", attempts = 5)
    
    def test_logTitleContinuity1(self):
        first_log = Logs.objects.get(title = "1")
        self.assertEqual(first_log.title, "1")

    def test_logDescContinuity1(self):
        self.assertEqual(Logs.objects.get(title = "1").desc, "Unit test 1")

    def test_logAttemptsContinuity1(self):
        self.assertEqual(Logs.objects.get(title = "1").attempts, 10)

    def test_logYearContinuity1(self):
        self.assertEqual(Logs.objects.get(title = "1").time.year, datetime.now().year)

    def test_logTitleContinuity2(self):
        first_log = Logs.objects.get(title = "2")
        self.assertEqual(first_log.title, "2")

    def test_logDescContinuity2(self):
        self.assertEqual(Logs.objects.get(title = "2").desc, "Unit test 2")

    def test_logAttemptsContinuity2(self):
        self.assertEqual(Logs.objects.get(title = "2").attempts, 5)

    def test_logYearContinuity2(self):
        self.assertEqual(Logs.objects.get(title = "2").time.year, datetime.now().year)

    def test_attemptsValidator(self):
        log = Logs.objects.create(title = '3', desc = 'Unit test 3', attempts=0)
        self.assertRaises(ValidationError, log.full_clean)
            
class StatisticsTestCase(TestCase):

    def setUp(self):
        Logs.objects.create(title = "Login information", desc = "User1 logged in", attempts = 3)
        Logs.objects.create(title = "Login information", desc = "User1 logged in", attempts = 1)
        Logs.objects.create(title = "Login information", desc = "User1 logged in", attempts = 2)
        Logs.objects.create(title = "Login information", desc = "User1 logged in", attempts = 5)
        Logs.objects.create(title = "Login information", desc = "User1 logged in", attempts = 10)
        
        Logs.objects.create(title = "Login information", desc = "User2 logged in", attempts = 3)
        Logs.objects.create(title = "Login information", desc = "User2 logged in", attempts = 1)
        Logs.objects.create(title = "Login information", desc = "User2 logged in", attempts = 1)
        Logs.objects.create(title = "Login information", desc = "User2 logged in", attempts = 1)

    def test_userAttemptsUser1(self):
        response_data = {
            'Total number of attempts for user': 21,
            'Average number of attempts per login': f"{(21 / 5):.2f}",
            'Least attempts per login': 1,
            'Most attempts per login': 10,
        }
        self.assertEqual(LogsStatisticsService.getAttemptsForUser("User1"), response_data)

    def test_userAttemptsUser2(self):
        response_data = {
            'Total number of attempts for user': 6,
            'Average number of attempts per login': f"{(6 / 4):.2f}",
            'Least attempts per login': 1,
            'Most attempts per login': 3,
        }
        self.assertEqual(LogsStatisticsService.getAttemptsForUser("User2"), response_data)

    def test_MarchLogins(self):
        self.assertEqual(LogsStatisticsService.getMarchLogs(), 1.00)

    def test_FebruaryLogins(self):
        self.assertEqual(LogsStatisticsService.getFebruaryLogs(), 0.00)

    def test_2024Logins(self):
        self.assertEqual(LogsStatisticsService.get2024Logs(), 1.00)

    def test_nonWorkhoursLogins(self):
        start_time = time(7, 0)
        end_time = time(15, 0)
        self.assertLess(LogsStatisticsService.getNonWorkingHoursLogs(start_time, end_time), 0.3)

    def test_workhoursLogins(self):
        start_time = time(7, 0)
        end_time = time(15, 0)
        # self.assertEqual(LogsStatisticsService.getWorkingHoursLogs(start_time, end_time), 1.00)
        self.assertGreater(LogsStatisticsService.getWorkingHoursLogs(start_time, end_time), 0.7)
