<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\AppointmentRepositoryInterface;
use App\Repositories\AppointmentRepository;

use App\Repositories\ServiceRepositoryInterface;
use App\Repositories\ServiceRepository;

use App\Repositories\StaffRepositoryInterface;
use App\Repositories\StaffRepository;

use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\CustomerRepository;

use App\Repositories\InventoryRepositoryInterface;
use App\Repositories\InventoryRepository;

use App\Repositories\InventoryUsageRepositoryInterface;
use App\Repositories\InventoryUsageRepository;

use App\Repositories\InventoryPurchaseRepositoryInterface;
use App\Repositories\InventoryPurchaseRepository;

use App\Repositories\InventoryAlertRepositoryInterface;
use App\Repositories\InventoryAlertRepository;

use App\Repositories\PosTransactionRepositoryInterface;
use App\Repositories\PosTransactionRepository;

use App\Repositories\NotificationTemplateRepositoryInterface;
use App\Repositories\NotificationTemplateRepository;

use App\Repositories\NotificationLogRepositoryInterface;
use App\Repositories\NotificationLogRepository;

use App\Repositories\Interfaces\ReportExportRepositoryInterface;
use App\Repositories\ReportExportRepository;

use App\Repositories\Interfaces\DashboardSnapshotRepositoryInterface;
use App\Repositories\DashboardSnapshotRepository;

use App\Repositories\Interfaces\ReportTemplateRepositoryInterface;
use App\Repositories\ReportTemplateRepository;

use App\Repositories\StaffServiceRepositoryInterface;
use App\Repositories\Eloquent\StaffServiceRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AppointmentRepositoryInterface::class, AppointmentRepository::class);
        $this->app->bind(ServiceRepositoryInterface::class, ServiceRepository::class);
        $this->app->bind(StaffRepositoryInterface::class, StaffRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(InventoryRepositoryInterface::class, InventoryRepository::class);
        $this->app->bind(InventoryUsageRepositoryInterface::class, InventoryUsageRepository::class);
        $this->app->bind(InventoryPurchaseRepositoryInterface::class,InventoryPurchaseRepository::class);
        $this->app->bind(InventoryAlertRepositoryInterface::class,InventoryAlertRepository::class);
        $this->app->bind(PosTransactionRepositoryInterface::class,PosTransactionRepository::class);
        $this->app->bind(NotificationTemplateRepositoryInterface::class,NotificationTemplateRepository::class);
        $this->app->bind(NotificationLogRepositoryInterface::class, NotificationLogRepository::class);
        $this->app->bind(ReportExportRepositoryInterface::class, ReportExportRepository::class);
        $this->app->bind(DashboardSnapshotRepositoryInterface::class, DashboardSnapshotRepository::class);
        $this->app->bind(ReportTemplateRepositoryInterface::class, ReportTemplateRepository::class);
         $this->app->bind(StaffServiceRepositoryInterface::class, StaffServiceRepository::class);
    }

    public function boot(): void
    {
        //
    }
}

