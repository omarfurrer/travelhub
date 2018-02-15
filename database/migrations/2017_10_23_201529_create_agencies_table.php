<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies',
                       function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('address')->nullable();
            $table->string('gmaps_url')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('fb_url')->nullable();
            $table->string('website_url')->nullable();
            $table->string('logo_path')->nullable();
            $table->date('doe')->nullable();
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
        Schema::dropIfExists('agencies');
    }

}
