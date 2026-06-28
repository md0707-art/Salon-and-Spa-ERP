<?php

     use Illuminate\Database\Migrations\Migration;
     use Illuminate\Database\Schema\Blueprint;
     use Illuminate\Support\Facades\Schema;

     return new class extends Migration
     {
         public function up(): void
         {
             Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 20)->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('photo')->nullable();
            $table->enum('role', ['stylist', 'therapist', 'admin', 'etc'])->default('stylist');
            $table->enum('status', ['active', 'inactive', 'on_leave'])->default('active');
            $table->date('joining_date')->nullable();
            $table->timestamps();
});

         }

         public function down(): void
         {
             Schema::dropIfExists('staff');
         }
     };