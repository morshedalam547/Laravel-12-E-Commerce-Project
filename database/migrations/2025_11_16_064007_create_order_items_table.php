<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('order_items', function (Blueprint $table) {
        $table->id();

        // Order relation
        $table->foreignId('order_id')
              ->constrained('orders')
              ->onDelete('cascade');

        // Product relation
        $table->foreignId('product_id')
              ->nullable()
              ->constrained('products')
              ->onDelete('set null');

        // Store product name (if product deleted)
        $table->string('product_name')->nullable();

        $table->integer('quantity');
        $table->decimal('price', 10, 2);

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
