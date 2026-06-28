<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Services\InventoryService;
use App\Models\InventoryCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\InventoryItem;

class InventoryController extends Controller
{
    protected InventoryService $inventoryService;

    public function __construct(InventoryService $inventoryService)
    {
        $this->inventoryService = $inventoryService;
    }

    public function index()
      {
          $inventoryItems = InventoryItem::paginate(10);
          return view('inventory.index', compact('inventoryItems'));
      }

    public function create(): View
    {
        $categories = InventoryCategory::all();
        return view('inventory.create', compact('categories'));
    }

    public function store(StoreInventoryRequest $request): RedirectResponse
    {
        $this->inventoryService->createItem($request->validated());
        return redirect()->route('inventory.index')->with('success', 'Inventory item created successfully.');
    }

    public function show(int $id): View
    {
        $inventoryItem = $this->inventoryService->getItemById($id);
        return view('inventory.show', compact('inventoryItem'));
    }

    public function edit(int $id): View
     {
         $inventoryItem = $this->inventoryService->getItemById($id);
         $categories = InventoryCategory::all();
         return view('inventory.edit', compact('inventoryItem', 'categories'));
     }


    public function update(UpdateInventoryRequest $request, int $id): RedirectResponse
    {
        $this->inventoryService->updateItem($id, $request->validated());
        return redirect()->route('inventory.index')->with('success', 'Inventory item updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->inventoryService->deleteItem($id);
        return redirect()->route('inventory.index')->with('success', 'Inventory item deleted successfully.');
    }
}
