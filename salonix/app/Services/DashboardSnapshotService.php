<?php

namespace App\Services;
use App\Models\DashboardSnapshot;
use App\Repositories\Interfaces\DashboardSnapshotRepositoryInterface;

class DashboardSnapshotService
{
    protected $snapshotRepo;

    public function __construct(DashboardSnapshotRepositoryInterface $snapshotRepo)
    {
        $this->snapshotRepo = $snapshotRepo;
    }

    public function getAll()
    {
        return $this->snapshotRepo->all();
    }

    public function getById($id)
    {
        return $this->snapshotRepo->find($id);
    }

    public function create(array $data)
      {
          \Log::info('Creating Dashboard Snapshot:', $data);  // For debugging
          return DashboardSnapshot::create($data);
      }
      

    public function update($id, array $data)
    {
        return $this->snapshotRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->snapshotRepo->delete($id);
    }
}
