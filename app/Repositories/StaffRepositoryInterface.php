<?php

namespace App\Repositories;

use App\Models\Staff;

interface StaffRepositoryInterface
{
    public function all();
    public function find($id): Staff;
    public function create(array $data): Staff;
    public function update(Staff $staff, array $data): Staff;
    public function delete(Staff $staff): bool;
}
