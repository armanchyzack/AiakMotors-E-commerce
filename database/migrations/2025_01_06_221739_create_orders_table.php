<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key to users table
            $table->string('name'); // Customer name
            $table->string('phone'); // Customer phone number
            $table->text('address'); // Customer address
            $table->text('product_names')->nullable();
            $table->decimal('total', 8, 2); // Total amount before discount
            $table->decimal('discount_amount', 8, 2)->default(0); // Discount amount
            $table->decimal('discounted_total', 8, 2)->default(0); // Total after discount
            $table->enum('payment_method', ['Cash on Delivery', 'Online'])->default('Cash on Delivery');
            $table->enum('status', ['pending', 'approved', 'delivered'])->default('pending'); // Enum for order status
            $table->timestamps();

            // Foreign key relationship
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
