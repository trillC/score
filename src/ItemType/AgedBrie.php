<?php

declare(strict_types=1);

namespace App\ItemType;

class AgedBrie extends Regular
{
    public function decreaseSellIn(): void
    {
        $this->sellIn--;

        $quality = $this->sellIn < 0 ? $this->quality + 2 : $this->quality + 1;

        if ($quality > 50) {
            $quality = 50;
        }

        $this->quality = $quality;
    }
}
