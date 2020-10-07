<?php

namespace Runroom\GildedRose\Items;

use Runroom\GildedRose\Item;

/**
 * Class BackStageItem.
 */
class BackStageItem extends Item
{
    const NAME = 'Backstage passes to a TAFKAL80ETC concert';

    /**
     * BackStageItem constructor.
     */
    public function __construct(int $sell_in, int $quality)
    {
        parent::__construct(self::NAME, $sell_in, $quality);
    }
}
