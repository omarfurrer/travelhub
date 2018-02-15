<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips',
                       function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('type')->nullbale();
            $table->text('extra_details')->nullbale();
            $table->integer('price_per_person')->nullbale();
            $table->string('currency')->nullbale();
            $table->date('deadline_date')->nullable();
            $table->boolean('external')->nullable();
            $table->integer('agency_id')->unsigned()->index();
            $table->foreign('agency_id')->references('id')->on('agencies')->onDelete('cascade');
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
        Schema::dropIfExists('trips');
    }

}
