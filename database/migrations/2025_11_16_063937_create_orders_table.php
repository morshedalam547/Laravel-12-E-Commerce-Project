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
    Schema::create('orders', function (Blueprint $table) {
        $table->id();

        $table->string('order_id')->unique();
        $table->string('name');
        $table->string('phone');
        $table->string('zip');
        $table->string('state');
        $table->string('city');
        $table->string('address');
        $table->string('locality');
        $table->string('landmark')->nullable();

        $table->decimal('subtotal', 10, 2);
        $table->decimal('vat', 10, 2);
        $table->decimal('total', 10, 2);

        $table->string('payment_method')->nullable();
        $table->timestamps();
    });

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
