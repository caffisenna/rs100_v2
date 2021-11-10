<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->dateTime('day1_start_time')->nullable();
            $table->dateTime('day1_end_time')->nullable();
            $table->dateTime('day2_start_time')->nullable();
            $table->dateTime('day2_end_time')->nullable();
            $table->dateTime('day1_retire')->nullable();
            $table->dateTime('day2_retire')->nullable();
            $table->dateTime('whole_retire')->nullable();
            $table->dateTime('reach_50km_time')->nullable();
            $table->dateTime('reach_100km_time')->nullable();
            $table->string('day1_distance')->nullable();
            $table->string('day2_distance')->nullable();
            $table->string('total_distance')->nullable();
            $table->time('day1_time')->nullable();
            $table->time('day2_time')->nullable();
            $table->time('total_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('statuses');
    }
}
