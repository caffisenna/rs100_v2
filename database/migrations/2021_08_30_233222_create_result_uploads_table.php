<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultUploadsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->date('date')->nullable();
            $table->string('distance')->nullable();
            $table->time('time')->nullable();
            $table->string('image_path')->nullable();
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
        Schema::drop('result_uploads');
    }
}
