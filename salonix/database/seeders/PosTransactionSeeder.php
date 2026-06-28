<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\PosTransaction;
use App\Models\Appointment;
use App\Models\User;

class PosTransactionSeeder extends Seeder
{
    public function run(): void
    {
        // Get first available appointment and user
        $appointment = Appointment::first();
        $user = User::first();

        // Ensure records exist
        if (!$appointment || !$user) {
            echo "Please seed appointments and users first.\n";
            return;
        }

        PosTransaction::create([
            'appointment_id'       => $appointment->id,
            'customer_id'          => $user->id,
            'total_amount'         => 2500.00,
            'discount'             => 200.00,
            'loyalty_points_used'  => 50,
            'final_amount'         => 2250.00,
            'payment_method'       => 'cash',
            'payment_status'       => 'paid',
            'invoice_number'       => 'INV-' . strtoupper(Str::random(6)),
            'transaction_date'     => Carbon::now(),
        ]);
    }
}
