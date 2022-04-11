<?php

namespace Hillel\Casts;

class DateTimeCast
{
    public static function set($value)
    {
        return (new \DateTime())
            ->setTimestamp($value)
            ->setTimezone(new \DateTimeZone('UTC'))
            ->getTimestamp();
    }

    public static function get($value)
    {
        return (new \DateTime())
            ->setTimestamp($value)
            ->setTimezone(new \DateTimeZone('Europe/Kiev'))
            ->format('Y-m-d H:i:s');
    }
}
