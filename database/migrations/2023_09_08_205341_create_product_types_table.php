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
        Schema::create('product_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->bigInteger('price');
            $table->string('name_type');
            $table->string('main_image')->nullable();
            // Сделать позже стандартное значение статуса 'не продается', чтобы только продаваемый товар выводился на экран ( поможет при создании записи продукта)  
            $table->enum('status', ['в наличии', 'нет в наличии', 'не продается'])->default('в наличии');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_types');
    }
};
