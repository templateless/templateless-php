<?php

namespace Templateless\Components;

enum ComponentId: string
{
    case BUTTON = 'BUTTON';
    case IMAGE = 'IMAGE';
    case LINK = 'LINK';
    case OTP = 'OTP';
    case POWERED_BY = 'POWERED_BY';
    case SOCIALS = 'SOCIALS';
    case TEXT = 'TEXT';
    case VIEW_IN_BROWSER = 'VIEW_IN_BROWSER';
}
