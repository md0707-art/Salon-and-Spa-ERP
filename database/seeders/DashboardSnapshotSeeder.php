<?php

namespace Database\Seeders;

use App\Models\DashboardSnapshot;
use Illuminate\Database\Seeder;

class DashboardSnapshotSeeder extends Seeder
{
    public function run(): void
    {
        DashboardSnapshot::create([
            'kpi_name' => 'total_revenue',
            'kpi_value' => 15500.75,
            'date_range' => 'This Month',
            'snapshot_date' => now()->toDateString(),
            'created_by' => 1,
        ]);
    }
}
