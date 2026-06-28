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
    Schema::create('inventory_purchases', function (Blueprint $table) {
        $table->id();
        $table->foreignId('inventory_id')->constrained('inventory_items')->onDelete('cascade');
        $table->string('supplier_name', 100);
        $table->decimal('quantity_added', 10, 2);
        $table->decimal('purchase_price', 10, 2);
        $table->date('purchase_date');
        $table->string('invoice_number', 100)->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_purchases');
    }
};
