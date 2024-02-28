from django.core.exceptions import ValidationError
from django.utils.translation import gettext_lazy as _

def validate_attempts(value):
    if value <= 0:
        raise ValidationError(
            _("%(value)s is not a accepted amount of attempts."),
            params={"value":value},
        )