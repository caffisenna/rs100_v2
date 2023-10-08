<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('driver_name');
            $table->string('district');
            $table->string('dan_name');
            $table->string('position');
            $table->string('cell_phone');
            $table->string('email');
            $table->string('relation');
            $table->string('car_number');
            $table->uuid('uuid')->unique();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('car_registrations');
    }
};
