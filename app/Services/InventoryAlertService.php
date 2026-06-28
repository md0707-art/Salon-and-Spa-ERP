<?php

namespace App\Services;

use App\Repositories\InventoryAlertRepositoryInterface;

class InventoryAlertService
{
    protected $alertRepo;

    public function __construct(InventoryAlertRepositoryInterface $alertRepo)
    {
        $this->alertRepo = $alertRepo;
    }

    public function getAll()
    {
        return $this->alertRepo->all();
    }

    public function create(array $data)
    {
        // You can add alert triggering logic here if needed
        return $this->alertRepo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->alertRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->alertRepo->delete($id);
    }

    public function find($id)
    {
        return $this->alertRepo->find($id);
    }
}

