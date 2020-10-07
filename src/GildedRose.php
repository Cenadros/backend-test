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
            if (!in_array($item->name, [AgedBrieItem::NAME, BackStageItem::NAME, SulfurasItem::NAME])) {
                $item->updateQuality();
            }

            // aged and backStage
            if (in_array($item->name, [AgedBrieItem::NAME, BackStageItem::NAME])) {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1;
                }
            }

            // backStage
            if (BackStageItem::NAME == $item->name) {
                if ($item->sell_in < 11) {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                    }
                }
                if ($item->sell_in < 6) {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                    }
                }
            }

            // any item but sulfuras
            if (in_array($item->name, [AgedBrieItem::NAME, BackStageItem::NAME])) {
                $item->sell_in = $item->sell_in - 1;
            }

            if ($item->sell_in < 0) {
                // backstage
                if ($item->name == BackStageItem::NAME) {
                    $item->quality = 0;
                }

                // aged
                if ($item->name == AgedBrieItem::NAME) {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                    }
                }
            }
        }
    }
}
