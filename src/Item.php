<?php

namespace App;

final class Item
{
    public function __construct(
        public readonly string $name,
        private int $sellIn,
        private int $quality,
    ) {
    }

    public function getQuality(): int
    {
        return $this->quality;
    }

    public function setQuality(int $quality): void
    {
        $quality < 0 ? $this->quality = 0 : $this->quality = $quality;
    }

    public function getSellIn(): int
    {
        return $this->sellIn;
    }

    public function decreaseSellIn(): void
    {
        $this->sellIn--;
    }
}
