<?php

namespace Runroom\GildedRose;

/**
 * Class Item.
 */
class Item
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $sell_in;

    /**
     * @var int
     */
    public $quality;

    /**
     * Quality limits.
     */
    const QUALITY_UPPER_LIMIT = 50;
    const QUALITY_LOWER_LIMIT = 0;

    /**
     * Item constructor.
     */
    public function __construct(string $name, int $sell_in, int $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    /**
     *  Item text output.
     */
    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    public function updateQuality(): void
    {
        // Update sell in date
        --$this->sell_in;

        // Degrade quality
        $this->quality -= $this->sell_in < 0 ? 2 : 1;
        $this->verifyQuality();
    }

    /**
     * Verifies quality and adjusts it.
     */
    protected function verifyQuality(): void
    {
        if ($this->quality < self::QUALITY_LOWER_LIMIT) {
            $this->quality = self::QUALITY_LOWER_LIMIT;
        } elseif ($this->quality > self::QUALITY_UPPER_LIMIT) {
            $this->quality = self::QUALITY_UPPER_LIMIT;
        }
    }
}
