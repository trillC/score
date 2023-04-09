<?php

declare(strict_types=1);

namespace Tests;

use App\GildedRose;
use App\ItemFactory;
use PHPUnit\Framework\TestCase;

class GildedRoseMagicRingTest extends TestCase
{
    /**
     * @dataProvider itemsProvider
     */
    public function testUpdateQualityTest(
        string $name,
        int $sellIn,
        int $quality,
        int $expectedSellIn,
    ): void {
        $item = ItemFactory::create($name, $sellIn, $quality);

        $gildedRose = new GildedRose();
        $gildedRose->updateQuality($item);

        $this->assertEquals($expectedSellIn, $item->getSellIn());
        $this->assertGreaterThanOrEqual($quality - 3, $item->getQuality());
        $this->assertLessThanOrEqual($quality + 3, $item->getQuality());
    }

    public function itemsProvider(): array
    {
        return [
            ['Magic Ring of White Wizard', 10, 10, 9, '?']
        ];
    }
}
