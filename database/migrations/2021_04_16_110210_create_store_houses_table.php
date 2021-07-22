<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_houses', function (Blueprint $table) {
          $table->id();
          $table->text('auth_id')->nullable();
          $table->string('name');
          $table->string('number');
          $table->string('email');
          $table->text('address1');
          $table->text('address2')->nullable();
          $table->string('postal');
          $table->string('city');
          $table->string('state');
          $table->string('country');
          $table->string('person_name');
          $table->string('person_number');
          $table->string('person_email');
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
        Schema::dropIfExists('store_houses');
    }
}
