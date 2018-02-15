<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripMediaTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_media',
                       function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('path');
            $table->string('type')->nullable();
            $table->integer('trip_id')->unsigned()->index();
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
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
        Schema::dropIfExists('trip_media');
    }

}
