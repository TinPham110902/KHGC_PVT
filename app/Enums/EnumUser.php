<?php

namespace App\Enums;

enum EnumUser: string
{
    case WAITING = '0';
    case ALLOWED = '1';
    case DENIED = '2';
    case BLOCKED = '3';

    
}

