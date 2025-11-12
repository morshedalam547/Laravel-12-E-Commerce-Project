<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // coupon code (e.g. SAVE10)
            $table->enum('type', ['fixed', 'percent'])->default('percent'); // discount type
            $table->decimal('value', 10, 2)->default(0); // discount amount/value
            $table->decimal('cart_value', 10, 2)->default(0); // minimum cart value
            $table->date('expires_at')->nullable(); // expiry date
            $table->boolean('status')->default(true); // active/inactive
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
