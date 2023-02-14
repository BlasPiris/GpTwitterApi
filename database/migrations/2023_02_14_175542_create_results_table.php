<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_competidor');
            $table->integer('id_session');
            $table->integer('position');
            $table->integer('fast_lap');
            $table->integer('laps')->nullable();
            $table->integer('total_time')->nullable();
            $table->integer('avg')->nullable();
            $table->integer('points')->nullable();
            
            $table->index(['id_competidor', 'id_session'], 'id_competidor');
            $table->foreign('id_session', 'results_ibfk_1')->references('id')->on('sessions');
            $table->foreign('id_competidor', 'results_ibfk_2')->references('id')->on('competitors_editions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
