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
            $table->id('product_id');
            $table->bigInteger('artisan_id')->unsigned();
            $table->string('product_name');
            $table->text('description');
            $table->json('image')->nullable();
            $table->double('price');
            $table->integer('stock_quantity');
            $table->unsignedBigInteger('catagory_id');
            $table->foreign('artisan_id')->references('artisan_id')->on('artisans');
            $table->foreign('catagory_id')->references('catagory_id')->on('product_catagories');
            $table->timestamps();
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
