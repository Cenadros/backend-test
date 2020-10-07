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
     * {@inheritDoc}
     */
    public function updateQuality(): void
    {
        ++$this->quality;

        if ($this->sell_in < 11) {
            if ($this->quality < 50) {
                $this->quality = $this->quality + 1;
            }
        }
        if ($this->sell_in < 6) {
            if ($this->quality < 50) {
                $this->quality = $this->quality + 1;
            }
        }

        // Update sell in date
        --$this->sell_in;

        if ($this->sell_in < 0) {
            $this->quality = 0;
        }

        $this->verifyQuality();
    }
}
