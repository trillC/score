<?php

declare(strict_types=1);

namespace Tests;

use App\GildedRose;
use App\QualityRulesRegistry;
use App\Item;
use App\QualityRules\MagicRingsRules;
use PHPUnit\Framework\TestCase;

class GildedRoseMagicItemsTest extends TestCase
{
    private GildedRose $gildedRose;
    private MagicRingsRules $magicRingRules;

    public function setUp(): void
    {
        $this->magicRingRules = $this->getMockBuilder(MagicRingsRules::class)
            ->onlyMethods(['getQualityStep'])
            ->getMock();

        $this->gildedRose = new GildedRose(
            (new QualityRulesRegistry())
                ->addRules($this->magicRingRules)
        );
    }

    public function testUpdateQualityTest(): void
    {
        $item = new Item('Magic Ring of the wizard', 10, 20);

        $this->magicRingRules
            ->expects($this->once())
            ->method('getQualityStep')
            ->with(10)
            ->willReturn(-20);

        $this->gildedRose->updateQuality($item);

        $this->assertEquals(9, $item->getSellIn());
        $this->assertEquals(40, $item->getQuality());
    }
}
