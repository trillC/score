<?php

declare(strict_types=1);

namespace App;

class QualityRulesRegistry
{
    private array $rulesCollectionByItemType = [];

    public function __construct(
        private readonly ?QualityRulesInterface $defaultRules = null,
    ) {
    }

    public function addRules(QualityRulesInterface $itemQualityRules): static
    {
        $this->rulesCollectionByItemType[$itemQualityRules->getType()] = $itemQualityRules;
        return $this;
    }

    /** @throws */
    public function getRulesByName(string $itemName): QualityRulesInterface
    {
        $keys = array_keys($this->rulesCollectionByItemType);
        foreach ($keys as $itemType) {
            if (str_starts_with($itemName, $itemType) === true) {
                return $this->rulesCollectionByItemType[$itemType];
            }
        }

        if ($this->defaultRules === null) {
            throw new \Exception('No rules found for item name: ' . $itemName);
        }

        return $this->defaultRules;
    }
}
