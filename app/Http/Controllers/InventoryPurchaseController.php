<?php

namespace App\Http\Controllers;

use App\Models\InventoryPurchase;
use App\Models\InventoryItem;
use Illuminate\Http\Request;

class InventoryPurchaseController extends Controller
{
    public function index()
    {
        $purchases = InventoryPurchase::with('inventoryItem')->latest()->paginate(10);
        return view('inventory.purchases.index', compact('purchases'));
    }

    public function create()
    {
        $inventoryItems = InventoryItem::all();
        return view('inventory.purchases.create', compact('inventoryItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'inventory_id' => 'required|exists:inventory_items,id',
            'supplier_name' => 'required|string|max:100',
            'quantity_added' => 'required|numeric|min:1',
            'purchase_price' => 'required|numeric|min:0',
            'purchase_date' => 'required|date',
            'invoice_number' => 'nullable|string|max:100',
        ]);

        InventoryPurchase::create($request->all());

        $item = InventoryItem::find($request->inventory_id);
        $item->increment('quantity', $request->quantity_added);

        return redirect()->route('inventory-purchase.index')->with('success', 'Purchase recorded successfully.');
    }

    public function destroy($id)
    {
        $purchase = InventoryPurchase::findOrFail($id);

        // Optionally reverse the inventory quantity
        $item = InventoryItem::find($purchase->inventory_id);
        if ($item) {
            $item->decrement('quantity', $purchase->quantity_added);
        }

        $purchase->delete();

        return redirect()->route('inventory-purchase.index')->with('success', 'Purchase deleted successfully.');
    }
}
