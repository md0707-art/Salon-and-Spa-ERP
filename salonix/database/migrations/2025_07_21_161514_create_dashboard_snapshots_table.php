<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dashboard_snapshots', function (Blueprint $table) {
            $table->id();
            $table->string('kpi_name', 100);
            $table->decimal('kpi_value', 10, 2);
            $table->string('date_range', 50);
            $table->date('snapshot_date');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dashboard_snapshots');
    }
};
