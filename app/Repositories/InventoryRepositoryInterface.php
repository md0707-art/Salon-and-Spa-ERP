<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\InventoryItem;

interface InventoryRepositoryInterface
{
    public function all(): Collection;

    public function find(int $id): ?InventoryItem;

    public function create(array $data): InventoryItem;

    public function update(int $id, array $data): bool;

    public function delete(int $id): bool;

    public function getLowStockItems(): Collection;
}
