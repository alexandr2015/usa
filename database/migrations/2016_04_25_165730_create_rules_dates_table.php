<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRulesDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rules_id')->unsigned();
            $table->foreign('rules_id')->references('id')->on('rules');
            $table->date('date_from');
            $table->date('date_to');
            $table->boolean('include');
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
        Schema::table('rules_dates', function (Blueprint $table) {
            $table->dropForeign('rules_dates_rules_id_foreign');
        });
        Schema::drop('rules_dates');
    }
}
