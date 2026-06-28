<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function all()
    {
        return Customer::latest()->get();
    }

    public function find($id)
    {
        return Customer::findOrFail($id);
    }

    public function create(array $data)
    {
        return Customer::create($data);
    }

    public function store(array $data)
    {
        return $this->create($data);
    }

    public function update(Customer $customer, array $data)
    {
        $customer->update($data);
        return $customer;
    }

    public function delete(Customer $customer)
    {
        return $customer->delete();
    }

    public function searchByPhoneOrName($term)
    {
        return Customer::where('phone', 'like', "%$term%")
                       ->orWhere('name', 'like', "%$term%")
                       ->get();
    }

    public function addLoyaltyPoints(Customer $customer, int $points)
    {
        $customer->increment('loyalty_points', $points);
        return $customer;
    }
}
