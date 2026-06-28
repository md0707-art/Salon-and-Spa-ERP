<?php

namespace App\Http\Controllers;

use App\Models\InventoryItem;
use Illuminate\Http\Request;

class LowStockAlertController extends Controller
{
    public function index()
    {
        $lowStockItems = InventoryItem::whereColumn('quantity', '<', 'low_stock_alert')->get();
        return view('inventory.alerts.index', compact('lowStockItems'));
    }
}
