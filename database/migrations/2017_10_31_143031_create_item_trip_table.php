<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTripTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_trip',
                       function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trip_id')->unsigned()->index();
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->integer('trip_item_id')->unsigned()->index();
            $table->foreign('trip_item_id')->references('id')->on('trip_items')->onDelete('cascade');
            $table->integer('order')->nullable();
            $table->boolean('included')->nullable();
            $table->text('extra_details')->nullable();
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
        Schema::dropIfExists('item_trip');
    }

}
