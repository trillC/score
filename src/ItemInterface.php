<?php

declare(strict_types=1);

namespace App;

interface ItemInterface
{
    public function getName(): string;
    public function getSellIn(): int;
    public function getQuality(): int;
    public function decreaseSellIn(): void;
}
