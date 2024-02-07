<?php

namespace Templateless\Errors;

enum ErrorType: string
{
    case UNAUTHORIZED = 'Unauthorized';
    case FORBIDDEN = 'Forbidden';
    case INVALID_PARAMETER = 'InvalidParameter';
    case BAD_REQUEST = 'BadRequest';
    case UNAVAILABLE = 'Unavailable';
    case UNKNOWN = 'Unknown';
}
