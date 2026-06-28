<?php

namespace App\Services;

use App\Models\Staff;
use App\Repositories\StaffRepositoryInterface;

class StaffService
{
    protected $staffRepository;

    public function __construct(StaffRepositoryInterface $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    public function all()
    {
        return $this->staffRepository->all();
    }

    public function find($id)
    {
        return $this->staffRepository->find($id);
    }

    public function create(array $data)
    {
        return $this->staffRepository->create($data);
    }

    public function update(Staff $staff, array $data)
    {
        return $this->staffRepository->update($staff, $data);
    }

    public function delete(Staff $staff)
    {
        return $this->staffRepository->delete($staff);
    }

    public function assignServices(Staff $staff, array $serviceIds)
    {
        $staff->services()->sync($serviceIds);
        return $staff->load('services');
    }

    public function updateStatus(Staff $staff, string $status)
    {
        $staff->status = $status;
        $staff->save();
        return $staff;
    }

    public function getAvailableStaff(string $day, string $time)
    {
        return $this->staffRepository->getAvailableStaff($day, $time);
    }
}
