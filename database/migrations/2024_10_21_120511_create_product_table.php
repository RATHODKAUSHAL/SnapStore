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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->string('company_name')->nullable();
            $table->foreignId('category_id')->nullable();
            // $table->string('category_name')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_model')->nullable();
            $table->string('product_price')->nullable();
            $table->string('product_image')->nullable();
            $table->string('product_discount')->nullable();
            $table->string('product_description')->nullable();
            $table->string('product_rating')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
