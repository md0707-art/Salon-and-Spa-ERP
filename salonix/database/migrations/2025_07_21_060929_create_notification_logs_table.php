<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('notification_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['appointment', 'greeting', 'promo', 'alert']);
            $table->enum('channel', ['email', 'sms', 'in-app']);
            $table->string('subject', 150);
            $table->text('content');
            $table->enum('status', ['sent', 'failed', 'pending'])->default('pending');
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('notification_logs');
    }
};
