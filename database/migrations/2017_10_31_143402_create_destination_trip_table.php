<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationTripTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination_trip',
                       function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trip_id')->unsigned()->index();
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->integer('destination_id')->unsigned()->index();
            $table->foreign('destination_id')->references('id')->on('destinations')->onDelete('cascade');
            $table->integer('order')->nullable();
            $table->text('extra_details')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('destination_trip');
    }

}
