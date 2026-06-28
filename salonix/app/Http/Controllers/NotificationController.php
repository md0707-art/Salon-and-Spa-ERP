<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NotificationTemplateService;
use App\Services\NotificationLogService;
use App\Http\Requests\StoreNotificationTemplateRequest;
use App\Http\Requests\UpdateNotificationTemplateRequest;

class NotificationController extends Controller
{
    protected $templateService;
    protected $logService;

    public function __construct(
        NotificationTemplateService $templateService,
        NotificationLogService $logService
    ) {
        $this->templateService = $templateService;
        $this->logService = $logService;
    }

    // Show list of templates
    public function indexTemplates()
    {
        $templates = $this->templateService->getAll();
        return view('notifications.templates.index', compact('templates'));
    }

    // Show form to create template
    public function createTemplate()
    {
        return view('notifications.templates.create');
    }

    // Store new template
    public function storeTemplate(StoreNotificationTemplateRequest $request)
    {
        \Log::info('Template Create Request', $request->all());
        $this->templateService->create($request->validated());
        return redirect()->route('notifications.templates.index')->with('success', 'Template created successfully.');
    }

    // Edit a template
    public function editTemplate($id)
    {
        $template = $this->templateService->find($id);
        return view('notifications.templates.edit', compact('template'));
    }

    // Update a template
    public function updateTemplate(UpdateNotificationTemplateRequest $request, $id)
    {
        $this->templateService->update($id, $request->validated());
        return redirect()->route('notifications.templates.index')->with('success', 'Template updated successfully.');
    }

    // Delete a template
    public function destroyTemplate($id)
    {
        $this->templateService->delete($id);
        return redirect()->route('notifications.templates.index')->with('success', 'Template deleted.');
    }

    // Show log history
    public function indexLogs()
    {
        $logs = $this->logService->getAll();
        return view('notifications.logs.index', compact('logs'));
    }

    // Show a single notification log
    public function showLog($id)
    {
        $log = $this->logService->find($id);
        return view('notifications.logs.show', compact('log'));
    }
}
