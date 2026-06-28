<?php

namespace App\Repositories\Eloquent;

use App\Models\StaffService;
use App\Repositories\StaffServiceRepositoryInterface;

class StaffServiceRepository implements StaffServiceRepositoryInterface
{
    public function assignService(array $data)
    {
        return StaffService::create($data);
    }

    public function getServicesByStaffId($staffId)
    {
        return StaffService::with('service')->where('staff_id', $staffId)->get();
    }

    public function removeService($id)
    {
        return StaffService::findOrFail($id)->delete();
    }
}
