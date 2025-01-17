<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('password', 60)->nullable();
            $table->boolean('terms_and_conditions');
            $table->date('birthday')->nullable();
            $table->string('gender', 255)->nullable();
            $table->string('community', 255)->nullable();
            $table->string('availability', 255)->nullable();
            $table->string('estimated_time', 255)->nullable();
            $table->string('cartype', 255)->nullable();
            $table->string('nro_doc', 15);
            //$table->string("patente", 15);
            $table->string('description', 1000);
            $table->string('mobile_phone', 50);
            $table->string('image', 255);

            $table->boolean('banned');
            $table->boolean('is_admin');

            $table->boolean('active');
            $table->string('activation_token', 50)->nullable();

            $table->boolean('emails_notifications');

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
