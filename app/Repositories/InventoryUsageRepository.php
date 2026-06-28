<?php

namespace App\Repositories;

use App\Models\InventoryUsage;

class InventoryUsageRepository implements InventoryUsageRepositoryInterface
{
    public function all()
    {
        return InventoryUsage::all();
    }

    public function create(array $data)
    {
        return InventoryUsage::create($data);
    }

    public function find($id)
    {
        return InventoryUsage::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $usage = InventoryUsage::findOrFail($id);
        $usage->update($data);
        return $usage;
    }

    public function delete($id)
    {
        return InventoryUsage::destroy($id);
    }
}
