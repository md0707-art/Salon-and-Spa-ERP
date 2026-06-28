<?php

namespace App\Http\Controllers;

use App\Models\InventoryUsage;
use App\Models\InventoryItem;
use App\Models\Service;
use App\Models\Staff;
use Illuminate\Http\Request;

class InventoryUsageController extends Controller
{
    public function index()
    {
        $usages = InventoryUsage::with(['inventoryItem', 'service', 'staff'])->latest()->paginate(10);
        return view('inventory.usages.index', compact('usages'));
    }

    public function create()
    {
        $items = InventoryItem::all();
        $services = Service::all();
        $staff = Staff::all();

        return view('inventory.usages.create', compact('items', 'services', 'staff'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'inventory_id' => 'required|exists:inventory_items,id',
            'service_id' => 'required|exists:services,id',
            'staff_id' => 'required|exists:staff,id',
            'quantity_used' => 'required|numeric|min:0.1',
        ]);

        InventoryUsage::create($request->all());

        // Decrease stock
        $item = InventoryItem::find($request->inventory_id);
        $item->decrement('quantity', $request->quantity_used);

        return redirect()->route('inventory-usage.index')->with('success', 'Usage recorded successfully.');
    }

    public function destroy($id)
    {
        $usage = InventoryUsage::findOrFail($id);

        // Optionally increase the inventory back
        $item = InventoryItem::find($usage->inventory_id);
        if ($item) {
            $item->increment('quantity', $usage->quantity_used);
        }

        $usage->delete();

        return redirect()->route('inventory-usage.index')->with('success', 'Usage deleted successfully.');
    }
}
