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
}
