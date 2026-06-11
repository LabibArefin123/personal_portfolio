<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('project_informations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable()->index();
            $table->longText('overview')->nullable();
            $table->json('project_images')->nullable();
            $table->json('custom_features')->nullable();
            $table->json('project_languages')->nullable();
            $table->longText('challenges')->nullable();
            $table->longText('solution')->nullable();
            $table->longText('conclusion')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('project_informations');
    }
};
