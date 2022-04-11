<?php

namespace Hillel\Casts;

class ArrayCast
{
    public static function set($value)
    {
        return json_encode($value);
    }

    public static function get($value)
    {
//        var_dump($value);
//        exit;
        return json_decode($value, true);
    }
}
