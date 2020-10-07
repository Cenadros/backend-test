<?php

namespace Runroom\GildedRose;

use Runroom\GildedRose\Items\AgedBrieItem;
use Runroom\GildedRose\Items\BackStageItem;
use Runroom\GildedRose\Items\SulfurasItem;
use function PHPUnit\Framework\isNan;

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
    public function update_quality()
    {
        foreach ($this->items as $item) {
            // default items
            if (!in_array($item->name, [SulfurasItem::NAME])) {
                $item->updateQuality();
            }
        }
    }
}
