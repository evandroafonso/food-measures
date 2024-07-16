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
        Schema::create('event_measures', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('quantity');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->foreignId('unit_measurement_id')->references('id')->on('unit_measurement');
            $table->foreignId('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_measures');
    }
};
