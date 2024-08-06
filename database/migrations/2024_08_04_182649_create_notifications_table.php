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
        Schema::create('notifications', function (Blueprint $table) {
           //$table->id();
            $table->id('notification_id');
            $table->bigInteger('artisan_id')->unsigned();
            $table->text('message');
            $table->boolean('is_read')->comment('0 = unread, 1 = read');
            $table->foreign('artisan_id')->references('artisan_id')->on('artisans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
