<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_waiters', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 45)->unique();
            $table->unsignedInteger('attempts')->default(0);
            $table->timestamp('last_attempt_at')->nullable();
            $table->timestamp('last_submission_at')->nullable();
            $table->timestamp('blocked_until')->nullable();
            $table->index('blocked_until');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_waiters');
    }
};
