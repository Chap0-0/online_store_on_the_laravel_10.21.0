<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id')->references('id')->on('product_colors')->onDelete('cascade');
            $table->unsignedBigInteger('memory_id')->nullable();
            $table->foreign('memory_id')->references('id')->on('product_memories')->onDelete('cascade');
            $table->unsignedBigInteger('size_id')->nullable();
            $table->foreign('size_id')->references('id')->on('product_sizes')->onDelete('cascade');
            $table->bigInteger('price');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_prices');
    }
};