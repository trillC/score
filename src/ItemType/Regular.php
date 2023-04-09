<?php

declare(strict_types=1);

namespace App\ItemType;

use App\ItemInterface;

class Regular implements ItemInterface
{
    public function __construct(
        private readonly string $name,
        protected int $sellIn,
        protected int $quality,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSellIn(): int
    {
        return $this->sellIn;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }

    public function decreaseSellIn(): void
    {
        $this->sellIn--;

        $quality = $this->sellIn < 0 ? $this->quality - 2 : $this->quality - 1;

        if ($quality < 0) {
            $quality = 0;
        }

        $this->quality = $quality;
    }
}
