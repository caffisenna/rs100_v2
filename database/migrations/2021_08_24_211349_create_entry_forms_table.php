<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntryFormsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->text('furigana');
            $table->text('bs_id');
            $table->text('district');
            $table->text('dan_name');
            $table->date('birth_day');
            $table->text('gender');
            $table->text('zip');
            $table->text('address');
            $table->text('telephone');
            $table->text('cellphone');
            $table->text('exp_50km');
            $table->text('parent_name');
            $table->text('parent_name_furigana');
            $table->text('parent_relation');
            $table->text('emer_phone');
            $table->text('sm_name');
            $table->text('sm_position');
            $table->boolean('sm_confirmation')->nullable;
            $table->boolean('map_upload')->nullable;
            $table->uuid('uuid')->nullable();
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
        Schema::drop('entry_forms');
    }
}
