<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Appointment;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
        Appointment::create([
            'customer_id' => 1, 
            'service_id' => 1,  
            'staff_id' => 1,    
            'appointment_date' => now()->toDateString(),
            'appointment_time' => now()->format('H:i'),
            'status' => 'confirmed',
            'channel' => 'walk-in',
        ]);
    }
}
