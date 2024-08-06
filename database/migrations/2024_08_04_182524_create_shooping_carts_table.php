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
        Schema::create('shooping_carts', function (Blueprint $table) {
            //$table->id();
            $table->id('cart_id');
            $table->bigInteger('customer_id')->unsigned();
            $table->boolean('checkout')->comment('o = not_check_out, 1=check_out');
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->timestamps();
        });
    }
 // Define the cast for the checkout attribute
 protected $casts = [
    'checkout' => 'boolean',
];
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shooping_carts');
    }
};
