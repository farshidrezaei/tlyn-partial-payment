<?php

namespace App\Traits;

trait EnumHelper
{
    public static function toArray(): array
    {
        return array_combine(self::values(), self::keys());
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function keys(): array
    {
        return array_column(self::cases(), 'name');
    }
}
