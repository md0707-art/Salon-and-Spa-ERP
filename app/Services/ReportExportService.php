<?php

namespace App\Services;
use App\Models\ReportExport;
use App\Repositories\Interfaces\ReportExportRepositoryInterface;

class ReportExportService
{
    protected $reportExportRepo;

    public function __construct(ReportExportRepositoryInterface $reportExportRepo)
    {
        $this->reportExportRepo = $reportExportRepo;
    }

    public function getAll()
    {
        return $this->reportExportRepo->all();
    }

    public function getById($id)
    {
        return $this->reportExportRepo->find($id);
    }

    public function create(array $data)
     {
         \Log::info('Creating ReportExport', $data); // Add this for debugging
     
         return ReportExport::create($data);
     }


    public function update($id, array $data)
    {
        return $this->reportExportRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->reportExportRepo->delete($id);
    }
}
