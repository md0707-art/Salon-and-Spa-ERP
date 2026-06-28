<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDashboardSnapshotRequest;
use App\Http\Requests\UpdateDashboardSnapshotRequest;
use App\Services\DashboardSnapshotService;

class DashboardSnapshotController extends Controller
{
    protected $snapshotService;

    public function __construct(DashboardSnapshotService $snapshotService)
    {
        $this->snapshotService = $snapshotService;
    }

    public function index()
    {
        $snapshots = $this->snapshotService->getAll();
        return view('reports.snapshots.index', compact('snapshots'));
    }

    public function create()
      {
          return view('reports.snapshots.create');
      }
      
      public function edit($id)
      {
          $dashboardSnapshot = $this->snapshotService->getById($id);
          return view('reports.snapshots.edit', compact('dashboardSnapshot'));
      }


    public function store(StoreDashboardSnapshotRequest $request)
     {
         $this->snapshotService->create($request->validated());
     
         return redirect()->route('dashboard-snapshots.index')->with('success', 'Snapshot Created');
     }
     

    public function show($id)
    {
        $snapshot = $this->snapshotService->getById($id);
        return view('reports.dashboard.show', compact('snapshot'));
    }

    public function update(UpdateDashboardSnapshotRequest $request, $id)
      {
          $this->snapshotService->update($id, $request->validated());
      
          return redirect()->route('dashboard-snapshots.index')->with('success', 'Snapshot Updated');
      }


    public function destroy($id)
    {
        $this->snapshotService->delete($id);
        return redirect()->back()->with('success', 'Snapshot Deleted');
    }
}
