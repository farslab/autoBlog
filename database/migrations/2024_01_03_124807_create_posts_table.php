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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('content');
            $table->text('meta_keywords')->nullable();
            $table->string('slug')->nullable();
            $table->string('status')->default('published');
            $table->integer('is_featured')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('author')->default('autoBlog');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
