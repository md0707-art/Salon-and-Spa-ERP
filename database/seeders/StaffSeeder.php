<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    public function run()
    {
        $staffData = [
            ['name' => 'Aarav Shrestha', 'email' => 'aarav@salonix.com', 'phone' => '9800000001', 'role' => 'stylist'],
            ['name' => 'Sita Gurung', 'email' => 'sita@salonix.com', 'phone' => '9800000002', 'role' => 'stylist'],
            ['name' => 'Bibek Lama', 'email' => 'bibek@salonix.com', 'phone' => '9800000003', 'role' => 'therapist'],
            ['name' => 'Kriti KC', 'email' => 'kriti@salonix.com', 'phone' => '9800000004', 'role' => 'therapist'],
            ['name' => 'Ankit Sharma', 'email' => 'ankit@salonix.com', 'phone' => '9800000005', 'role' => 'stylist'],
            ['name' => 'Sarita Thapa', 'email' => 'sarita@salonix.com', 'phone' => '9800000006', 'role' => 'stylist'],
            ['name' => 'Rajan Rai', 'email' => 'rajan@salonix.com', 'phone' => '9800000007', 'role' => 'therapist'],
            ['name' => 'Nisha Maharjan', 'email' => 'nisha@salonix.com', 'phone' => '9800000008', 'role' => 'stylist'],
        ];

        foreach ($staffData as $staff) {
            Staff::updateOrCreate(
                ['email' => $staff['email']],
                $staff
            );
        }
    }
}
