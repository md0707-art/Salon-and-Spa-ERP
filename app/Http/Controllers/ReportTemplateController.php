<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportTemplateRequest;
use App\Http\Requests\UpdateReportTemplateRequest;
use App\Services\ReportTemplateService;

class ReportTemplateController extends Controller
{
    protected $templateService;

    public function __construct(ReportTemplateService $templateService)
    {
        $this->templateService = $templateService;
    }

    public function index()
    {
        $templates = $this->templateService->getAll();
        return view('reports.templates.index', compact('templates'));
    }

    public function create()
    {
        return view('reports.templates.create');
    }

    public function store(StoreReportTemplateRequest $request)
    {
        $this->templateService->create($request->validated());
        return redirect()->route('report-templates.index')->with('success', 'Report Template Created Successfully.');
    }

    public function show($id)
    {
        $template = $this->templateService->getById($id);
        return view('reports.templates.show', compact('template'));
    }

    public function edit($id)
    {
        $template = $this->templateService->getById($id);
        return view('reports.templates.edit', compact('template'));
    }

    public function update(UpdateReportTemplateRequest $request, $id)
    {
        $this->templateService->update($id, $request->validated());
        return redirect()->route('report-templates.index')->with('success', 'Report Template Updated Successfully.');
    }

    public function destroy($id)
    {
        $this->templateService->delete($id);
        return redirect()->route('report-templates.index')->with('success', 'Report Template Deleted Successfully.');
    }
}
