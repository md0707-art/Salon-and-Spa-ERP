<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('inventory_usages', function (Blueprint $table) {
        $table->id();
        $table->foreignId('inventory_id')->constrained('inventory_items')->onDelete('cascade');
        $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
        $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade');
        $table->decimal('quantity_used', 10, 2);
        $table->timestamp('used_on')->useCurrent();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_usages');
    }
};
