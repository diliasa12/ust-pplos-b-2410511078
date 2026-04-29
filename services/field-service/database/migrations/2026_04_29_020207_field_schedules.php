<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('field_schedules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('field_id')->constrained('fields')->onDelete('cascade');
            $table->tinyInteger('day_of_week')->comment('0=Sunday, 1=Monday, ..., 6=Saturday');
            $table->time('open_time');
            $table->time('close_time');
            $table->boolean('is_open')->default(true);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('field_schedules');
    }
};
