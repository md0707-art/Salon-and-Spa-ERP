<?php

namespace App\Repositories;

interface StaffServiceRepositoryInterface
{
    public function assignService(array $data);
    public function getServicesByStaffId($staffId);
    public function removeService($id);
}
