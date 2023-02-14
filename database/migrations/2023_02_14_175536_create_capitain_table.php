<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapitainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capitain', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('id_driver')->nullable();
            $table->integer('id_team');
            $table->integer('id_edition');
            $table->string('name', 50)->nullable()->comment("in case the team does not have a competitor captain");
            
            $table->foreign('id_driver', 'capitain_ibfk_1')->references('id')->on('competitors');
            $table->foreign('id_team', 'capitain_ibfk_2')->references('id')->on('teams');
            $table->foreign('id_edition', 'capitain_ibfk_3')->references('id')->on('editions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capitain');
    }
}
