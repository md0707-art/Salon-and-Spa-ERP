<?php

namespace App\Repositories;

use App\Models\ReportExport;
use App\Repositories\Interfaces\ReportExportRepositoryInterface;

class ReportExportRepository implements ReportExportRepositoryInterface
{
    public function all()
    {
        return ReportExport::all();
    }

    public function find($id)
    {
        return ReportExport::findOrFail($id);
    }

    public function create(array $data)
    {
        return ReportExport::create($data);
    }

    public function update($id, array $data)
    {
        $report = ReportExport::findOrFail($id);
        $report->update($data);
        return $report;
    }

    public function delete($id)
    {
        return ReportExport::destroy($id);
    }
}
