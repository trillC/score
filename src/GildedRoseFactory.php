<?php

declare(strict_types=1);

namespace App;

use App\QualityRules\CommonItemRules;
use App\QualityRules\AgedBrieRules;
use App\QualityRules\SulfurasRules;
use App\QualityRules\BackstagePassRules;
use App\QualityRules\MagicRingsRules;

class GildedRoseFactory
{
    public static function create(): GildedRose
    {
        return new GildedRose(
            (new QualityRulesRegistry(new CommonItemRules()))
                ->addRules(new AgedBrieRules())
                ->addRules(new SulfurasRules())
                ->addRules(new BackstagePassRules())
                ->addRules(new MagicRingsRules())
        );
    }
}
