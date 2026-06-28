<?php

namespace App\Repositories;

use App\Models\Staff;

class StaffRepository implements StaffRepositoryInterface
{
    public function all()
    {
        return Staff::latest()->get();
    }

    public function find($id): Staff
    {
        return Staff::findOrFail($id);
    }

    public function create(array $data): Staff
    {
        return Staff::create($data);
    }

    public function update(Staff $staff, array $data): Staff
    {
        $staff->update($data);
        return $staff;
    }

    public function delete(Staff $staff): bool
    {
        return $staff->delete();
    }
}
