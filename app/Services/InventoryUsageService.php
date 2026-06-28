<?php

namespace App\Services;

use App\Repositories\InventoryUsageRepositoryInterface;

class InventoryUsageService
{
    protected $usageRepo;

    public function __construct(InventoryUsageRepositoryInterface $usageRepo)
    {
        $this->usageRepo = $usageRepo;
    }

    public function getAll()
    {
        return $this->usageRepo->all();
    }

    public function create(array $data)
    {
        // Add any extra business logic here if needed
        return $this->usageRepo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->usageRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->usageRepo->delete($id);
    }

    public function find($id)
    {
        return $this->usageRepo->find($id);
    }
}
