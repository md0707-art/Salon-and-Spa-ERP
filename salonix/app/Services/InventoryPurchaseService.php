<?php

namespace App\Services;

use App\Repositories\InventoryPurchaseRepositoryInterface;

class InventoryPurchaseService
{
    protected $purchaseRepo;

    public function __construct(InventoryPurchaseRepositoryInterface $purchaseRepo)
    {
        $this->purchaseRepo = $purchaseRepo;
    }

    public function getAll()
    {
        return $this->purchaseRepo->all();
    }

    public function create(array $data)
    {
        // Business logic like updating inventory quantity can be added here
        return $this->purchaseRepo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->purchaseRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->purchaseRepo->delete($id);
    }

    public function find($id)
    {
        return $this->purchaseRepo->find($id);
    }
}
