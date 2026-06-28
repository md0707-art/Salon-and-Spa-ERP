<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visit_history', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');

            // Make these nullable if using SET NULL on delete
            $table->foreignId('service_id')->nullable()->constrained('services')->onDelete('set null');
            $table->foreignId('staff_id')->nullable()->constrained('staff')->onDelete('set null');

            $table->date('visit_date');
            $table->text('feedback')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visit_history');
    }
};
