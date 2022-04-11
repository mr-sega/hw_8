<?php

namespace Hillel\Entities;

use Hillel\Casts\ArrayCast;
use Hillel\Casts\MoneyCast;
use Hillel\Casts\DateTimeCast;

class Product
{
    private float $price;

    private string $attributes;

    private int $updatedAt;

    protected $casts = [
        'price' => MoneyCast::class,
        'attributes' => ArrayCast::class,
        'updatedAt' => DateTimeCast::class,
    ];

    public function __construct($price, $attributes, $updatedAt)
    {
        $this->price = $price;
        $this->attributes = $attributes;
        $this->updatedAt = $updatedAt;
    }

    public function __set($variable, $value): void
    {
        $this->$variable = $this->casts[$variable]::set($value);
    }

    public function __get($variable)
    {
        return $this->casts[$variable]::get($this->$variable);
    }

    public function __toString(): string
    {
        return "price:" . $this->price .
            "attributes:" . $this->attributes .
            "updatedAt:" . $this->updatedAt;
    }
}