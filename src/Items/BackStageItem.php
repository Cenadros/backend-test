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

    /**
     * {@inheritdoc}
     */
    public function updateQuality(): void
    {
        // In any case quality increases
        ++$this->quality;

        if ($this->sell_in < 6) {
            $this->quality += 2;
        } elseif ($this->sell_in < 11) {
            ++$this->quality;
        }

        // Update sell in date
        --$this->sell_in;

        // Quality is zero if sell in date is zero
        if ($this->sell_in < 0) {
            $this->quality = 0;
        }

        $this->verifyQuality();
    }
}
