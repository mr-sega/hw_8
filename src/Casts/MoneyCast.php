<?php

namespace Hillel\Casts;

class MoneyCast
{
    public static function set($value)
    {
        return $value * 100;
    }

    public static function get($value)
    {
        return $value / 100;
    }
}
