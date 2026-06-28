<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('report_exports', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['appointment', 'sales', 'staff', 'inventory', 'customer']);
            $table->unsignedBigInteger('generated_by');
            $table->string('file_path', 255);
            $table->enum('format', ['pdf', 'excel']);
            $table->timestamps();

            $table->foreign('generated_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('report_exports');
    }
};
 