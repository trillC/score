<?php

declare(strict_types=1);

namespace App\QualityRules;

use App\Item;

class BackstagePassRules extends CommonItemRules
{
    public function getType(): string
    {
        return 'Backstage passes';
    }

    public function updateQualityForOneDay(Item $item): void
    {
        $sellIn = $item->getSellIn();
        $item->decreaseSellIn();

        if ($sellIn <= 0) {
            $item->setQuality(0);
            return;
        }

        $quality = $item->getQuality() + $this->getQualityStep($sellIn);

        if ($quality > 50) {
            $quality = 50;
        }

        $item->setQuality($quality);
    }

    protected function getQualityStep(int $sellIn): int
    {
        return match (true) {
            $sellIn <= 0 => 0,
            $sellIn <= 5 => 3,
            $sellIn <= 10 => 2,
            default => 1,
        };
    }
}
