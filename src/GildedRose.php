<?php

namespace App;

use InvalidArgumentException;

class GildedRose
{
    private static array $items = [
        'normal' => Item::class,
        'Aged Brie' => Brie::class,
        'Sulfuras, Hand of Ragnaros' => Sulfuras::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackstagePasses::class,
        'Conjured Mana Cake' => Conjured::class
    ];

    public static function of(string $name, int $quality, int $sellIn)
    {
        if (! array_key_exists($name, self::$items)) {
            throw new InvalidArgumentException('Item type does not exist.');
        }

        $class = self::$items[$name];

        return new $class($quality, $sellIn);
    }
}
