<?php

namespace App\Enums;

use App\Traits\EnumHelper;

enum OrderTypeEnum: string
{
    use EnumHelper;
    case SELL = 'sell';
    case BUY = 'buy';
}
