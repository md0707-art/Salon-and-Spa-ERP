<?php

namespace App\Repositories;

use App\Models\DashboardSnapshot;
use App\Repositories\Interfaces\DashboardSnapshotRepositoryInterface;

class DashboardSnapshotRepository implements DashboardSnapshotRepositoryInterface
{
    public function all()
    {
        return DashboardSnapshot::all();
    }

    public function find($id)
    {
        return DashboardSnapshot::findOrFail($id);
    }

    public function create(array $data)
    {
        return DashboardSnapshot::create($data);
    }

    public function update($id, array $data)
    {
        $snapshot = DashboardSnapshot::findOrFail($id);
        $snapshot->update($data);
        return $snapshot;
    }

    public function delete($id)
    {
        return DashboardSnapshot::destroy($id);
    }
}
