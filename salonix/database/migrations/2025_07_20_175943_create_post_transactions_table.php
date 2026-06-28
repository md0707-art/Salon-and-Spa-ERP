<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pos_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointment_id');
            $table->unsignedBigInteger('customer_id');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->integer('loyalty_points_used')->default(0);
            $table->decimal('final_amount', 10, 2);
            $table->enum('payment_method', ['cash', 'card', 'wallet', 'e-pay']);
            $table->enum('payment_status', ['pending', 'paid', 'refunded'])->default('pending');
            $table->string('invoice_number')->unique();
            $table->timestamp('transaction_date')->useCurrent();
            $table->timestamps();

            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pos_transactions');
    }
};
