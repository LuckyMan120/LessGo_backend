<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
			$table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('from_town', 500);
            $table->string('to_town', 500);
            $table->datetime('trip_date');
            $table->string('description', 1500);
            $table->integer('total_seats');
            $table->integer('friendship_type_id');
            $table->integer('community');
            $table->integer('payment');
            $table->integer('estimated_time');
            // $table->integer("is_active");
            $table->double('distance');
            $table->string('availability');
            $table->integer('co2');
            $table->integer('is_recurring');
            $table->boolean('is_passenger');
            $table->boolean('mail_send');
            $table->string('enc_path');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')
                                         ->onDelete('cascade')
                                         ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
    public function down()
    {
        Schema::drop('trips');
    }
}
