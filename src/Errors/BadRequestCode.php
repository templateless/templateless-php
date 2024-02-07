<?php

namespace Templateless\Errors;

enum BadRequestCode: int
{
    case ACCOUNT_QUOTA_EXCEEDED = 200;
    case PROVIDER_KEY_MISSING = 300;
    case PROVIDER_KEY_INVALID = 301;
    case EMAIL_NO_CONTENT = 400;
}
