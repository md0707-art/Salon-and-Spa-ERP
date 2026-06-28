<?php

namespace App\Repositories;

use App\Models\InventoryItem;
use Illuminate\Database\Eloquent\Collection;

class InventoryRepository implements InventoryRepositoryInterface
{
    public function all(): Collection
    {
        return InventoryItem::with('category')->latest()->get();
    }

    public function find(int $id): ?InventoryItem
    {
        return InventoryItem::with('category')->find($id);
    }

    public function create(array $data): InventoryItem
    {
        return InventoryItem::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $item = InventoryItem::findOrFail($id);
        return $item->update($data);
    }

    public function delete(int $id): bool
    {
        $item = InventoryItem::findOrFail($id);
        return $item->delete();
    }

    public function getLowStockItems(): Collection
    {
        return InventoryItem::whereColumn('quantity', '<=', 'low_stock_alert')->get();
    }
}
