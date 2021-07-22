<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_code')->nullable();
            $table->string('payment')->nullable();
            $table->string('status')->nullable();
            $table->string('booking_name')->nullable();
            $table->string('booking_email')->nullable();
            $table->string('booking_contact')->nullable();
            $table->string('booking_address')->nullable();
            $table->string('type')->nullable();
            $table->string('auth_id')->nullable();
            $table->string('auth_name')->nullable();
            $table->string('product_id')->nullable();
            $table->string('product_virtual_id')->nullable();
            $table->string('sku')->nullable();
            $table->string('product_name')->nullable();
            $table->string('unqid')->nullable();
            $table->string('price')->nullable();
            $table->string('total_price')->nullable();
            $table->string('qty')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
