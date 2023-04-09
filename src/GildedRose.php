<?php

declare(strict_types=1);

namespace App;

final class GildedRose
{
    public function __construct(
        private readonly QualityRulesRegistry $itemQualityRulesRegistry,
    ) {
    }

    /** @throws */
    public function updateQuality(Item $item): void
    {
        $this->itemQualityRulesRegistry
            ->getRulesByName($item->name)
            ->updateQualityForOneDay($item);
    }
}
