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
            $table->integer('zekken')->nullable(); // ゼッケン
            $table->text('furigana');
            $table->text('bs_gs'); // BSかGSか
            $table->text('bs_id')->nullable(); // GSは取らない
            $table->text('prefecture'); // 県連
            $table->text('district');   // 地区
            $table->text('dan_name');   // 団
            $table->date('birth_day');
            $table->text('gender');
            $table->text('zip');
            $table->text('address');
            $table->text('telephone');
            $table->text('cellphone');
            $table->text('exp_50km');
            $table->text('captain')->nullable(); // 代表者
            $table->text('parent_name');
            $table->text('parent_name_furigana');
            $table->text('parent_relation');
            $table->text('emer_phone');
            $table->text('sm_name');
            $table->text('sm_position');
            $table->date('sm_confirmation')->nullable();
            $table->text('buddy_ok')->nullable(); // バディの要請可否
            $table->text('buddy_match')->nullable(); // バディの斡旋希望
            $table->text('buddy_type')->nullable(); // バディの組み合わせ
            $table->text('buddy1_name')->nullable();
            $table->text('buddy1_dan')->nullable();
            $table->text('buddy2_name')->nullable();
            $table->text('buddy2_dan')->nullable();
            $table->date('fee_checked_at')->nullable(); // 東連以外の参加費納付チェック
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
