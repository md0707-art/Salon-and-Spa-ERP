<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Services\StaffService;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    protected $staffService;

    public function __construct(StaffService $staffService)
    {
        $this->staffService = $staffService;

        // Apply middleware if needed
        // $this->middleware('auth');
    }

    // List all staff
    public function index()
    {
        $staffs = $this->staffService->all();
        return view('staff.index', compact('staffs'));
    }

    // Show form to create staff
    public function create()
    {
        return view('staff.create');
    }

    // Store new staff
    public function store(StoreStaffRequest $request)
    {
        $this->staffService->create($request->validated());
        return redirect()->route('staff.index')->with('success', 'Staff created successfully.');
    }

    // Show single staff details
    public function show($id)
    {
        $staff = $this->staffService->find($id);
        return view('staff.show', compact('staff'));
    }

    // Show form to edit staff
    public function edit($id)
    {
        $staff = $this->staffService->find($id);
        return view('staff.edit', compact('staff'));
    }

    // Update existing staff
    public function update(UpdateStaffRequest $request, $id)
    {
        $staff = $this->staffService->find($id);
        $this->staffService->update($staff, $request->validated());
        return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
    }

    // Delete a staff
    public function destroy($id)
    {
        $staff = $this->staffService->find($id);
        $this->staffService->delete($staff);
        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully.');
    }
}
