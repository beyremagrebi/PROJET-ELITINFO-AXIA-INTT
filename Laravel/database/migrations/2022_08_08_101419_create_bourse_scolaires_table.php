<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBourseScolairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bourse_scolaires', function (Blueprint $table) {
            $table->id();
            $table->string('titreanne');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('D_UTILISATEUR');
            $table->datetime('date_demande');
            $table->integer('numero_administratif');
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
        Schema::dropIfExists('bourse_scolaires');
    }
}
