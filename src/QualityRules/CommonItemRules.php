<?php

declare(strict_types=1);

namespace App\QualityRules;

use App\Item;
use App\QualityRulesInterface;

class CommonItemRules implements QualityRulesInterface
{
    public function getType(): string
    {
        return 'Common Item';
    }

    public function updateQualityForOneDay(Item $item): void
    {
        $quality = $item->getQuality() - $this->getQualityStep($item->getSellIn());
        if ($quality < 0) {
            $quality = 0;
        }
        $item->setQuality($quality);
        $item->decreaseSellIn();
    }

    protected function getQualityStep(int $sellIn): int
    {
        return $sellIn <= 0 ? 2 : 1;
    }
}
