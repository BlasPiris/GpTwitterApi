<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCircuitsEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circuits_editions', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_circuit');
            $table->integer('id_edition');
            
            $table->index(['id_circuit', 'id_edition'], 'id_circuit');
            $table->foreign('id_circuit', 'circuits_editions_ibfk_1')->references('id')->on('circuits');
            $table->foreign('id_edition', 'circuits_editions_ibfk_2')->references('id')->on('editions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circuits_editions');
    }
}
