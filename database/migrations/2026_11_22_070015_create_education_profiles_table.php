
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('education_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->string('intro_title')->nullable();
            $table->text('intro_description')->nullable();
            $table->string('highlight_value')->nullable();
            $table->string('highlight_label')->nullable();
            $table->string('github_username')->nullable();
            $table->string('github_url')->nullable();
            $table->string('github_chart_url')->nullable();
            $table->string('github_title')->nullable();
            $table->text('github_description')->nullable();
            $table->json('github_activities')->nullable();
            $table->json('focus_cards')->nullable();
            $table->boolean('is_active')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('education_profiles');
    }
};
