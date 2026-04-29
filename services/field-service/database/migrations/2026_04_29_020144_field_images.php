<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('field_images', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('field_id')->constrained('fields')->onDelete('cascade');
            $table->text('image_url');
            $table->boolean('is_primary')->default(false);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('field_images');
    }
};
