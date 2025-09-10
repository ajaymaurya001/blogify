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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // Blog title
            $table->string('slug')->unique(); // URL friendly slug
            $table->text('content'); // Main blog content
            $table->string('image')->nullable(); // Blog featured image
            $table->unsignedBigInteger('catagory_id'); // FK -> catagories.id
            $table->boolean('status')->default(true); // Active/Inactive

            // SEO fields
            $table->string('meta_title')->nullable();       // SEO title
            $table->string('meta_description')->nullable(); // Meta description
            $table->string('meta_keywords')->nullable();    // Keywords
            $table->string('meta_keyphrase')->nullable();   // Focus keyphrase

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('catagory_id')
                ->references('id')->on('catagories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
