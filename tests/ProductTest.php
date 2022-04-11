<?php

namespace Hillel\Tests;

use ReflectionClass;
use Hillel\Entities\Product;
use PHPUnit\Framework\TestCase;

class StrTest extends TestCase
{
    protected Product $product;

    public function setUp(): void
    {
        $this->product = new Product(
            1750000,
            '{"memory":"8GB","color":"silver"}',
            1649428269
        );
    }

    public function testPrice()
    {
        $this->assertEqualsCanonicalizing(17500, $this->product->price);

        $this->assertEquals(
            1750000,
            (new ReflectionClass(Product::class))
                ->getProperty('price')
                ->getValue($this->product)
        );

        $this->product->price = 18500;

        $this->assertEqualsCanonicalizing(18500, $this->product->price);

        $this->assertEquals(
            1850000,
            (new ReflectionClass(Product::class))
                ->getProperty('price')
                ->getValue($this->product)
        );
    }

    public function testAttributes()
    {
        $this->assertEqualsCanonicalizing(
            ['memory' => '8GB', 'color' => 'silver'],
            $this->product->attributes
        );

        $this->assertEquals(
            '{"memory":"8GB","color":"silver"}',
            (new ReflectionClass(Product::class))
                ->getProperty('attributes')
                ->getValue($this->product)
        );

        $attributes = $this->product->attributes;
        $attributes['year'] = 2021;
        $this->product->attributes = $attributes;

        $this->assertEqualsCanonicalizing(
            ['memory' => '8GB', 'color' => 'silver', 'year' => 2021],
            $this->product->attributes
        );

        $this->assertEquals(
          '{"memory":"8GB","color":"silver","year":2021}',
          (new ReflectionClass(Product::class))
              ->getProperty('attributes')
              ->getValue($this->product)
        );
    }

    public function testUpdatedAt()
    {
        $this->assertEqualsCanonicalizing(
            '2022-04-08 17:31:09',
            $this->product->updatedAt
        );

        $this->assertEquals(
            1649428269,
            (new ReflectionClass(Product::class))
                ->getProperty('updatedAt')
                ->getValue($this->product)
        );

        $this->product->updatedAt = 1649433098;

        $this->assertEqualsCanonicalizing(
            '2022-04-08 18:51:38',
            $this->product->updatedAt
        );

        $this->assertEquals(
            1649433098,
            (new ReflectionClass(Product::class))
                ->getProperty('updatedAt')
                ->getValue($this->product)
        );
    }
}
