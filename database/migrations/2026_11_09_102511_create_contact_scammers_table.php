<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_scammers', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address', 45)->unique();
            $table->string('email')->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('reason', 255)->nullable();
            $table->string('user_agent', 500)->nullable();
            $table->string('message_hash', 64)->nullable();
            $table->unsignedInteger('hits')->default(1);
            $table->timestamp('blocked_until')->nullable();
            $table->boolean('is_permanent')->default(false);
            $table->index('blocked_until');
            $table->index('is_permanent');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_scammers');
    }
};
