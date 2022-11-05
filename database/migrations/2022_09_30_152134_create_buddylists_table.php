<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuddylistsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buddylists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person1');
            $table->integer('person2');
            $table->integer('person3')->nullable();
            $table->integer('person4')->nullable(); // 最大5人まで
            $table->integer('person5')->nullable(); // 最大5人まで
            $table->dateTime('confirmed')->nullable();
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
        Schema::drop('buddylists');
    }
}
