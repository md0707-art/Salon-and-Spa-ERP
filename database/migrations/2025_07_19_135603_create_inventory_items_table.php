<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->unsignedBigInteger('category_id'); // ✅ Must match 'id' from inventory_categories
            $table->decimal('quantity', 10, 2)->default(0);
            $table->string('unit', 20);
            $table->decimal('low_stock_alert', 10, 2)->default(0);
            $table->date('expiry_date')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();

            // ✅ Foreign Key Constraint
            $table->foreign('category_id')
                  ->references('id')
                  ->on('inventory_categories')
                  ->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('inventory_items');
    }
};
