<?php

namespace App\Repositories;

interface CustomerRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($customer, array $data);
    public function delete($customer);
    public function searchByPhoneOrName($term);
    public function addLoyaltyPoints($customer, int $points);
}
