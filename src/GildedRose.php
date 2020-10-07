<?php

namespace Runroom\GildedRose;

class GildedRose
{
    /** @var Item[] */
    private $items;

    /**
     * GildedRose constructor.
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Update quality method.
     */
    public function update_quality(): void
    {
        foreach ($this->items as $item) {
            $item->updateQuality();
        }
    }
}
