<?php

namespace Database\Seeders;

use App\Models\ReportTemplate;
use Illuminate\Database\Seeder;

class ReportTemplateSeeder extends Seeder
{
    public function run(): void
    {
        ReportTemplate::create([
            'name' => 'Weekly Appointment Summary',
            'type' => 'appointment',
            'filters_json' => json_encode(['from' => '2025-07-01', 'to' => '2025-07-07']),
            'created_by' => 1,
        ]);
    }
}
