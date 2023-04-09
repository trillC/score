<?php

declare(strict_types=1);

namespace App\ItemType;

class BackstagePasses extends Regular
{
    public function decreaseSellIn(): void
    {
        $this->sellIn--;

        if ($this->sellIn < 0) {
            $this->quality = 0;
        } elseif ($this->sellIn < 5) {
            $this->quality += 3;
        } elseif ($this->sellIn < 10) {
            $this->quality += 2;
        } else {
            $this->quality++;
        }

        if ($this->quality > 50) {
            $this->quality = 50;
        }
    }
}
