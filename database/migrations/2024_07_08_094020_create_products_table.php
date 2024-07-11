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
            $table->boolean('status')->default(true);
            $table->string('product_name');
            $table->unsignedBigInteger('suppliersID'); // Assuming you are using big integers for IDs
            $table->foreign('suppliersID')->references('id')->on('suppliers');
            $table->unsignedBigInteger('categories');
            $table->foreign('categories')->references('id')->on('categories');
            $table->integer('quantity');
            $table->integer('unitsInStock');
            $table->integer('UnitOnOrders');
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
