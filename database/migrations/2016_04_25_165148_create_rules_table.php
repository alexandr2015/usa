<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('weekdays', 3);
            $table->enum('location', ['state', 'timezone']);
            $table->integer('state_id')->unsigned()->nullable();
            $table->foreign('state_id')->references('id')->on('states');
            $table->integer('timezone_id')->unsigned()->nullable();
            $table->foreign('timezone_id')->references('id')->on('timezones');
            $table->boolean('all_year');
            $table->softDeletes();
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
        Schema::table('rules', function (Blueprint $table) {
            $table->dropForeign('rules_state_id_foreign');
            $table->dropForeign('rules_timezone_id_foreign');
        });

        Schema::drop('rules');
    }
}
