<?php

namespace App\Enums;

use App\Traits\EnumHelper;

enum OrderStatusEnum: string
{
    use EnumHelper;
    case INIT = 'init';
    case PROCESSING = 'processing';
    case REVOKED = 'revoked';
}
