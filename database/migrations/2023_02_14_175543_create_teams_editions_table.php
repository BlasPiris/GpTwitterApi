<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams_editions', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_team');
            $table->integer('id_edition');
            
            $table->unique(['id_team', 'id_edition'], 'team_id_2');
            $table->index(['id_team', 'id_edition'], 'team_id');
            $table->foreign('id_team', 'teams_editions_ibfk_1')->references('id')->on('teams');
            $table->foreign('id_edition', 'teams_editions_ibfk_2')->references('id')->on('editions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams_editions');
    }
}
