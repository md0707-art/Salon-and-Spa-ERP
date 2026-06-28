<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // // Add 'phone' column to users table
        // Schema::table('users', function (Blueprint $table) {
        //     $table->string('phone')->nullable()->after('email');
        // });

        // Add 'channel' column to appointments table
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('channel')->default('walk-in')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop 'phone' from users table
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
        });

        // Drop 'channel' from appointments table
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn('channel');
        });
    }
};
