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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
        $table->string('code')->unique();
        $table->decimal('discount', 5, 2); // Discount amount
        $table->enum('section', ['accessory', 'car']); // Target section
        $table->enum('status', ['active', 'inactive']); // Status (active/inactive)
        $table->integer('usage_limit_per_user'); // Number of times a user can use the coupon
        $table->integer('usage_limit_total'); // Total usage limit
        $table->dateTime('valid_from');
        $table->dateTime('valid_until');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {



        Schema::dropIfExists('coupons');
         // Revert to nullable

    }
};
