<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use App\Entities\Roles;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users',
                       function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->date('dob')->nullable();
            $table->integer('role')->default(Roles::USER);
            $table->rememberToken();
            $table->timestamps();
        });

        Artisan::call('db:seed', array('--class' => 'AdminUsersTableSeeder'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }

}
