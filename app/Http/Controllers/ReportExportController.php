<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportExportRequest;
use App\Http\Requests\UpdateReportExportRequest;
use App\Services\ReportExportService;
use Illuminate\Http\Request;

class ReportExportController extends Controller
{
    protected $reportService;

    public function __construct(ReportExportService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function index()
    {
        $exports = $this->reportService->getAll();
        return view('reports.exports.index', compact('exports'));
    }

    public function store(StoreReportExportRequest $request)
    {
        $this->reportService->create($request->validated());
        return redirect()->route('report-exports.index')->with('success', 'Report Export Created');
    }

    public function show($id)
    {
        $report = $this->reportService->getById($id);
        return view('reports.exports.show', compact('report'));
    }

    public function update(UpdateReportExportRequest $request, $id)
       {
           \Log::info('Update ReportExport called', ['id' => $id, 'data' => $request->all()]); // Debug log
       
           $this->reportService->update($id, $request->validated());
       
           return redirect()->route('report-exports.index')->with('success', 'Report Export Updated');
       }


    public function destroy($id)
    {
        $this->reportService->delete($id);
        return redirect()->back()->with('success', 'Report Export Deleted');
    }

    public function create()
     {
         return view('reports.exports.create');
     }
     
     public function edit($id)
     {
         $reportExport = $this->reportService->getById($id);
         return view('reports.exports.edit', compact('reportExport'));
     }

}
