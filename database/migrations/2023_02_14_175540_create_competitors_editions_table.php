<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitorsEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitors_editions', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_competitor');
            $table->integer('id_group');
            $table->integer('id_team');
            $table->integer('id_edition');
            
            $table->foreign('id_competitor', 'competitors_editions_ibfk_1')->references('id')->on('competitors');
            $table->foreign('id_group', 'competitors_editions_ibfk_2')->references('id')->on('groups');
            $table->foreign('id_edition', 'competitors_editions_ibfk_3')->references('id')->on('editions');
            $table->foreign('id_team', 'competitors_editions_ibfk_4')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competitors_editions');
    }
}
