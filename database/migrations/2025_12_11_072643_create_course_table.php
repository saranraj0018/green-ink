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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->enum('type', ['free', 'paid'])->default('free');
            $table->decimal('amount', 10, 2)->nullable();        // Null when type = free
            $table->integer('hours')->nullable();               // Total course hours
            $table->decimal('star_point', 3, 2)->default(0);    // e.g., 4.5
            $table->longText('description')->nullable();
            $table->string('image')->nullable();           // Intro video URL or storage path
            $table->longText('course_overview')->nullable();
            $table->longText('learning_outcomes')->nullable();
            $table->string('cover_video');
            $table->tinyInteger('status')->default(1)->comment('1-active, 2-inactive');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('no action');
        });

        Schema::create('course_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('file_name');
            $table->string('file_path');
            $table->string('file_type', 50)->nullable();
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
        Schema::dropIfExists('course_videos');
    }
};
