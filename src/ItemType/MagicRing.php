<?php

declare(strict_types=1);

namespace App\ItemType;

class MagicRing extends Regular
{
    /** @throws  \Exception */
    public function decreaseSellIn(): void
    {
        $this->sellIn--;
        $this->quality += random_int(0, 3);

        if ($this->quality < 0) {
            $this->quality = 0;
        }

        if ($this->quality > 50) {
            $this->quality = 50;
        }
    }
}
