<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PosTransactionController;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
Route::get('/appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
// Public (Frontend) Appointment Booking
Route::get('/book-appointment', [AppointmentController::class, 'publicCreate'])->name('appointments.public.create');
Route::post('/book-appointment', [AppointmentController::class, 'publicStore'])->name('appointments.public.store');



// Service Management Routes
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

Route::get('/browse-services', [ServiceController::class, 'publicIndex'])->name('services.public.index');




// Customer Management Routes
// Route::middleware(['auth'])->group(function () {
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/{customer}', [CustomerController::class, 'show'])->name('customers.show');
    Route::get('/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{customer}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{customer}', [CustomerController::class, 'destroy'])->name('customers.destroy');
// });

//staff management 


Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
Route::post('/staff', [StaffController::class, 'store'])->name('staff.store');
Route::get('/staff/{staff}', [StaffController::class, 'show'])->name('staff.show');
Route::get('/staff/{staff}/edit', [StaffController::class, 'edit'])->name('staff.edit');
Route::put('/staff/{staff}', [StaffController::class, 'update'])->name('staff.update');
Route::delete('/staff/{staff}', [StaffController::class, 'destroy'])->name('staff.destroy');


//inventory management


use App\Http\Controllers\InventoryUsageController;
use App\Http\Controllers\InventoryPurchaseController;
use App\Http\Controllers\LowStockAlertController;

// Inventory Items
Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
Route::get('/inventory/{inventory}', [InventoryController::class, 'show'])->name('inventory.show');
Route::get('/inventory/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
Route::put('/inventory/{inventory}', [InventoryController::class, 'update'])->name('inventory.update');
Route::delete('/inventory/{inventory}', [InventoryController::class, 'destroy'])->name('inventory.destroy');

// Inventory Usage
Route::get('/inventory-usage', [InventoryUsageController::class, 'index'])->name('inventory-usage.index');
Route::get('/inventory-usage/create', [InventoryUsageController::class, 'create'])->name('inventory-usage.create');
Route::post('/inventory-usage', [InventoryUsageController::class, 'store'])->name('inventory-usage.store');
Route::delete('/inventory-usage/{usage}', [InventoryUsageController::class, 'destroy'])->name('inventory-usage.destroy');

// Inventory Purchase
Route::get('/inventory-purchase', [InventoryPurchaseController::class, 'index'])->name('inventory-purchase.index');
Route::get('/inventory-purchase/create', [InventoryPurchaseController::class, 'create'])->name('inventory-purchase.create');
Route::post('/inventory-purchase', [InventoryPurchaseController::class, 'store'])->name('inventory-purchase.store');
Route::delete('/inventory-purchase/{purchase}', [InventoryPurchaseController::class, 'destroy'])->name('inventory-purchase.destroy');

// Low Stock Alerts

Route::get('/inventory/alerts/low-stock', [LowStockAlertController::class, 'index'])->name('inventory.alerts.low');


//POS Transaction


Route::get('/pos', [PosTransactionController::class, 'index'])->name('pos.index');
Route::get('/pos/create/{appointmentId}', [PosTransactionController::class, 'create'])->name('pos.create');
Route::post('/pos', [PosTransactionController::class, 'store'])->name('pos.store');
Route::get('/pos/{id}/edit', [PosTransactionController::class, 'edit'])->name('pos.edit');
Route::put('/pos/{id}', [PosTransactionController::class, 'update'])->name('pos.update');
Route::delete('/pos/{id}', [PosTransactionController::class, 'destroy'])->name('pos.destroy');

//notification
use App\Http\Controllers\NotificationController;

// Notification Templates
Route::get('/notification-templates', [NotificationController::class, 'indexTemplates'])->name('notifications.templates.index');
Route::get('/notification-templates/create', [NotificationController::class, 'createTemplate'])->name('notifications.templates.create');
Route::post('/notification-templates', [NotificationController::class, 'storeTemplate'])->name('notifications.templates.store');
Route::get('/notification-templates/{id}/edit', [NotificationController::class, 'editTemplate'])->name('notifications.templates.edit');
Route::put('/notification-templates/{id}', [NotificationController::class, 'updateTemplate'])->name('notifications.templates.update');
Route::delete('/notification-templates/{id}', [NotificationController::class, 'destroyTemplate'])->name('notifications.templates.destroy');


// Notification Logs
Route::get('/notification-logs', [NotificationController::class, 'indexLogs'])->name('notifications.logs.index');
Route::get('/notification-logs/{id}', [NotificationController::class, 'showLog'])->name('notifications.logs.show');

//ReportExport
use App\Http\Controllers\ReportExportController;

Route::get('/report-exports', [ReportExportController::class, 'index'])->name('report-exports.index');
Route::get('/report-exports/create', [ReportExportController::class, 'create'])->name('report-exports.create');
Route::post('/report-exports', [ReportExportController::class, 'store'])->name('report-exports.store');
Route::get('/report-exports/{reportExport}/edit', [ReportExportController::class, 'edit'])->name('report-exports.edit');
Route::put('/report-exports/{reportExport}', [ReportExportController::class, 'update'])->name('report-exports.update');
Route::delete('/report-exports/{reportExport}', [ReportExportController::class, 'destroy'])->name('report-exports.destroy');


//DashboardSnapshot
use App\Http\Controllers\DashboardSnapshotController;

Route::get('/dashboard-snapshots', [DashboardSnapshotController::class, 'index'])->name('dashboard-snapshots.index');
Route::get('/dashboard-snapshots/create', [DashboardSnapshotController::class, 'create'])->name('dashboard-snapshots.create');
Route::post('/dashboard-snapshots', [DashboardSnapshotController::class, 'store'])->name('dashboard-snapshots.store');
Route::get('/dashboard-snapshots/{dashboardSnapshot}/edit', [DashboardSnapshotController::class, 'edit'])->name('dashboard-snapshots.edit');
Route::put('/dashboard-snapshots/{dashboardSnapshot}', [DashboardSnapshotController::class, 'update'])->name('dashboard-snapshots.update');
Route::delete('/dashboard-snapshots/{dashboardSnapshot}', [DashboardSnapshotController::class, 'destroy'])->name('dashboard-snapshots.destroy');


//ReportTemplate
use App\Http\Controllers\ReportTemplateController;


// Route::middleware(['auth'])->group(function () {
    Route::get('/report-templates', [ReportTemplateController::class, 'index'])->name('report-templates.index');
    Route::get('/report-templates/create', [ReportTemplateController::class, 'create'])->name('report-templates.create');
    Route::post('/report-templates', [ReportTemplateController::class, 'store'])->name('report-templates.store');
    Route::get('/report-templates/{reportTemplate}/edit', [ReportTemplateController::class, 'edit'])->name('report-templates.edit');
    Route::put('/report-templates/{reportTemplate}', [ReportTemplateController::class, 'update'])->name('report-templates.update');
    Route::delete('/report-templates/{reportTemplate}', [ReportTemplateController::class, 'destroy'])->name('report-templates.destroy');
// });
