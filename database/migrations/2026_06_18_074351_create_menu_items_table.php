<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->decimal('old_price', 8, 2)->nullable();
            $table->string('image')->default('1.jpg');
            $table->decimal('rating', 3, 1)->default(5.0);
            $table->integer('reviews_count')->default(0);
            $table->integer('calories')->nullable();
            $table->integer('prep_time')->nullable();
            $table->string('badge')->nullable();
            $table->string('badge_type')->nullable();
            $table->string('tags')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};