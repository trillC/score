<?php

declare(strict_types=1);

namespace App\QualityRules;

class MagicRingsRules extends CommonItemRules
{
    public function getType(): string
    {
        return 'Magic Ring';
    }

    protected function getQualityStep(int $sellIn): int
    {
        return rand(-3, 3) * $sellIn;
    }
}
