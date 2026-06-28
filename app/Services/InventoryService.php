<?php

namespace App\Services;

use App\Repositories\InventoryRepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\InventoryItem;

class InventoryService
{
    protected InventoryRepositoryInterface $inventoryRepository;

    public function __construct(InventoryRepositoryInterface $inventoryRepository)
    {
        $this->inventoryRepository = $inventoryRepository;
    }

    public function getAllItems(): Collection
    {
        return $this->inventoryRepository->all();
    }

    public function getItemById(int $id): ?InventoryItem
    {
        return $this->inventoryRepository->find($id);
    }

    public function createItem(array $data): InventoryItem
    {
        return $this->inventoryRepository->create($data);
    }

    public function updateItem(int $id, array $data): bool
    {
        return $this->inventoryRepository->update($id, $data);
    }

    public function deleteItem(int $id): bool
    {
        return $this->inventoryRepository->delete($id);
    }

    public function getLowStockItems(): Collection
    {
        return $this->inventoryRepository->getLowStockItems();
    }
}
