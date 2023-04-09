<?php

declare(strict_types=1);

namespace App;

interface QualityRulesInterface
{
    public function getType(): string;
    public function updateQualityForOneDay(Item $item): void;
}
