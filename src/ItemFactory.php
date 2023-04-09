<?php

declare(strict_types=1);

namespace App;

use App\ItemType\AgedBrie;
use App\ItemType\BackstagePasses;
use App\ItemType\Regular;
use App\ItemType\Sulfuras;

class ItemFactory
{
    private const ITEM_TYPES = [
        'Aged Brie' => AgedBrie::class,
        'Backstage passes' => BackstagePasses::class,
        'Sulfuras' => Sulfuras::class,
    ];

    public static function create(string $name, int $sellIn, int $quality): ItemInterface
    {
        foreach (self::ITEM_TYPES as $itemType => $class) {
            if (str_starts_with($name, $itemType)) {
                return new $class($name, $sellIn, $quality);
            }
        }

        return new Regular($name, $sellIn, $quality);
    }
}
