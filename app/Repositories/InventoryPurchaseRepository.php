<?php

namespace App\Repositories;

use App\Models\InventoryPurchase;

class InventoryPurchaseRepository implements InventoryPurchaseRepositoryInterface
{
    public function all()
    {
        return InventoryPurchase::all();
    }

    public function create(array $data)
    {
        return InventoryPurchase::create($data);
    }

    public function find($id)
    {
        return InventoryPurchase::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $purchase = InventoryPurchase::findOrFail($id);
        $purchase->update($data);
        return $purchase;
    }

    public function delete($id)
    {
        return InventoryPurchase::destroy($id);
    }
}
