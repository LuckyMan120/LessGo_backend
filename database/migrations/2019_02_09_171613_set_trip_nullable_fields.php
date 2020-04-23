<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetTripNullableFields extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->integer('is_recurring')->nullable()->change();
            $table->boolean('mail_send')->default(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->integer('is_recurring')->nullable(false)->change();
            DB::statement('ALTER TABLE trips ALTER COLUMN mail_send DROP DEFAULT');
        });
    }
}
