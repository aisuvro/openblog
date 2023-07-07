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
        Schema::disableForeignKeyConstraints();

        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 250);
            $table->string('slug', 250)->index()->unique()->nullable();
            $table->longText('description')->nullable();
            $table->string('featured_image', 150)->nullable()->default('no-image.png');
            $table->string('image_caption',150)->nullable()->default('No caption');
            $table->string('is_published')->default('true');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
