<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElFormEtapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EL_FORMETAPES', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_form');
            $table->foreign('id_form')->references('id')->on('EL_FORMULAIRES');
            $table->boolean('activeEtape1');
            $table->string('intituleEtape1');
            $table->boolean('activeEtape2');
            $table->string('intituleEtape2');
            $table->boolean('activeEtape3');
            $table->string('intituleEtape3');
            $table->boolean('activeEtape4');
            $table->string('intituleEtape4');
            $table->boolean('activeEtape5');
            $table->string('intituleEtape5');
            $table->boolean('activeEtape6');
            $table->string('intituleEtape6');
            $table->boolean('activeEtape7');
            $table->string('intituleEtape7');
            $table->boolean('activeEtape8');
            $table->string('intituleEtape8');
            $table->boolean('activeEtape9');
            $table->string('intituleEtape9');
            $table->boolean('activeEtape10');
            $table->string('intituleEtape10');
            
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
        Schema::dropIfExists('EL_FORMETAPES');
    }
}
