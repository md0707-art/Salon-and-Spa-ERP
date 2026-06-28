<?php

namespace Database\Seeders;

use App\Models\ReportExport;
use Illuminate\Database\Seeder;

class ReportExportSeeder extends Seeder
{
    public function run(): void
    {
        ReportExport::create([
            'type' => 'sales',
            'generated_by' => 1,
            'file_path' => 'exports/sales_report_july2025.pdf',
            'format' => 'pdf',
        ]);
    }
}
