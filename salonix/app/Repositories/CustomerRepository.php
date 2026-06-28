<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface
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

    public function update($customer, array $data)
    {
        $customer->update($data);
        return $customer;
    }

    public function delete($customer)
    {
        return $customer->delete();
    }

    public function searchByPhoneOrName($term)
    {
        return Customer::where('phone', 'like', "%$term%")
                       ->orWhere('name', 'like', "%$term%")
                       ->get();
    }

    public function addLoyaltyPoints($customer, int $points)
    {
        $customer->increment('loyalty_points', $points);
        return $customer;
    }
}
