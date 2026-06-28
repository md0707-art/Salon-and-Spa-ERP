<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $customers = [
            ['name' => 'Ram Shrestha', 'email' => 'ram.shrestha@example.com', 'phone' => '9800000001'],
            ['name' => 'Sita Magar', 'email' => 'sita.magar@example.com', 'phone' => '9800000002'],
            ['name' => 'Gopal Thapa', 'email' => 'gopal.thapa@example.com', 'phone' => '9800000003'],
            ['name' => 'Maya Kafle', 'email' => 'maya.kafle@example.com', 'phone' => '9800000004'],
            ['name' => 'Rajesh Adhikari', 'email' => 'rajesh.adhikari@example.com', 'phone' => '9800000005'],
            ['name' => 'Sunita Poudel', 'email' => 'sunita.poudel@example.com', 'phone' => '9800000006'],
            ['name' => 'Dipak Shrestha', 'email' => 'dipak.shrestha@example.com', 'phone' => '9800000007'],
            ['name' => 'Reena Bhattarai', 'email' => 'reena.bhattarai@example.com', 'phone' => '9800000008'],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
