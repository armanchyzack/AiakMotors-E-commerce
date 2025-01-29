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
        Schema::create('wheel_slices', function (Blueprint $table) {
            $table->id();
            $table->string('slice_one');
            $table->string('slice_two');
            $table->string('slice_three');
            $table->string('slice_four');
            $table->string('slice_five');
            $table->string('slice_six');
            $table->string('slice_seven');
            $table->string('slice_eight'); // Store the text for each slice
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
        Schema::dropIfExists('wheel_slices');
    }
};
