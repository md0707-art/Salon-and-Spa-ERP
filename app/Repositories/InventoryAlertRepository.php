<?php

namespace App\Repositories;

use App\Models\InventoryItem;

class InventoryAlertRepository implements InventoryAlertRepositoryInterface
{
    public function getLowStockItems()
    {
        return InventoryItem::whereColumn('quantity', '<', 'low_stock_alert')->get();
    }
}
