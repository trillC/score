<?php

declare(strict_types=1);

namespace Tests;

class GildedRoseNewItemsTest extends GildedRoseTest
{
    public function itemsProvider(): array
    {
        return [
            'Aged Brie before sell in date' => ['Aged Brie, Blue', 10, 10, 9, 11],
            'Aged Brie sell in date' => ['Aged Brie, Blue', 0, 10, -1, 12],
            'Aged Brie after sell in date' => ['Aged Brie, Blue', -5, 10, -6, 12],
            'Aged Brie before sell in date with maximum quality' => ['Aged Brie, Blue', 5, 50, 4, 50],
            'Aged Brie sell in date near maximum quality' => ['Aged Brie, Blue', 0, 49, -1, 50],
            'Aged Brie sell in date with maximum quality' => ['Aged Brie, Blue', 0, 50, -1, 50],
            'Aged Brie after_sell in date with maximum quality' => ['Aged Brie, Blue', -10, 50, -11, 50],
            'Backstage passes before sell in date' => ['Backstage passes to Metallica concert', 10, 10, 9, 12],
            'Backstage passes more than 10 days before sell in date'
                => ['Backstage passes to Metallica concert', 11, 10, 10, 11],
            'Backstage passes five days before sell in date' => ['Backstage passes to Metallica concert', 5, 10, 4, 13],
            'Backstage passes sell in date' => ['Backstage passes to Metallica  concert', 0, 10, -1, 0],
            'Backstage passes close to sell in date with maximum quality'
                => ['Backstage passes to Metallica concert', 10, 50, 9, 50],
            'Backstage passes very close to sell in date with maximum quality'
               => ['Backstage passes to Metallica concert', 5, 50, 4, 50],
            'Backstage passes after sell in date' => ['Backstage passes to Metallica concert', -5, 50, -6, 0],
            'Sulfuras before sell in date' => ['Sulfuras, Mace', 10, 80, 10, 80],
            'Sulfuras sell in date' => ['Sulfuras, Mace', 0, 80, 0, 80],
            'Sulfuras after sell in date' => ['Sulfuras, Mace', -1, 80, -1, 80],
            'Golem shoes before sell in date' => ['Golem shoes', 10, 10, 9, 9],
            'Golem shoes sell in date' => ['Golem shoes', 0, 10, -1, 8],
        ];
    }
}
