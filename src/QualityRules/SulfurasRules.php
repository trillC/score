<?php

declare(strict_types=1);

namespace App\QualityRules;

use App\Item;
use App\QualityRulesInterface;

class SulfurasRules implements QualityRulesInterface
{
    public function getType(): string
    {
        return 'Sulfuras';
    }

    public function updateQualityForOneDay(Item $item): void
    {
    }
}
