<?php

namespace Runroom\GildedRose\Items;

use Runroom\GildedRose\Item;

/**
 * Class SulfurasItem.
 */
class SulfurasItem extends Item
{
    const NAME = 'Sulfuras, Hand of Ragnaros';

    /**
     * SulfurasItem constructor.
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
        // Never changes
    }
}
