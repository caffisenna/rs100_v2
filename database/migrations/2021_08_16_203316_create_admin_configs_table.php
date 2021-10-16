<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminConfigsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('create_account')->default(false);
            $table->boolean('create_application')->default(false);
            $table->boolean('elearning')->default(false);
            $table->boolean('healthcheck')->default(false);
            $table->boolean('user_edit')->default(false);
            $table->boolean('user_upload')->default(false);
            $table->boolean('status_day1')->default(false);
            $table->boolean('status_day2')->default(false);
            $table->boolean('show_status_link')->default(false);
            $table->boolean('temps_link')->default(false);
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
        Schema::drop('admin_configs');
    }
}
