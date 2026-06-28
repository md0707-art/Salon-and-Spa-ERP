<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Services\ServiceService;
use App\Models\ServiceCategory;

class ServiceController extends Controller
{
    protected $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    public function index()
    {
        $services = $this->serviceService->getAll();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        $categories = ServiceCategory::all();
        return view('services.create', compact('categories'));
    }

    public function store(StoreServiceRequest $request)
    {
        $this->serviceService->create($request->validated());
        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        $service = $this->serviceService->getById($id);
        $categories = ServiceCategory::all();
        return view('services.edit', compact('service', 'categories'));
    }

    public function update(UpdateServiceRequest $request, $id)
    {
        $this->serviceService->update($id, $request->validated());
        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $this->serviceService->delete($id);
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
    public function show($id)
    {
        $service = $this->serviceService->find($id);
        return view('services.show', compact('service'));
    }

}
