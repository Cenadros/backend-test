<?php

namespace Runroom\GildedRose\Items;

use Runroom\GildedRose\Item;

/**
 * Class AgedBrieItem.
 */
class AgedBrieItem extends Item
{
    const NAME = 'Aged Brie';

    /**
     * AgedBrieItem constructor.
     */
    public function __construct(int $sell_in, int $quality)
    {
        parent::__construct(self::NAME, $sell_in, $quality);
    }

    /**
     * {@inheritdoc}
     */
    public function updateQuality(): void
    {
        // Update sell in date
        --$this->sell_in;

        // Quality increases over time
        $this->quality += 2;
        $this->verifyQuality();
    }
}
