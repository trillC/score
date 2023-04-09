<?php

declare(strict_types=1);

namespace App\QualityRules;

use App\Item;

class AgedBrieRules extends CommonItemRules
{
    public function getType(): string
    {
        return 'Aged Brie';
    }

    public function updateQualityForOneDay(Item $item): void
    {
        $quality = $item->getQuality() + $this->getQualityStep($item->getSellIn());

        if ($quality > 50) {
            $quality = 50;
        }

        $item->setQuality($quality);
        $item->decreaseSellIn();
    }
}
