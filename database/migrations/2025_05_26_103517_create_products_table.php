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
        Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->json('attributes')->nullable(); // multiple attributes
        $table->unsignedBigInteger('category_id');
        $table->unsignedBigInteger('subcategory_id')->nullable();
        $table->string('image_url')->nullable();
        $table->decimal('price', 10, 2)->default(0);
        $table->integer('stock')->default(0);
        $table->timestamps();

        // Foreign keys
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
