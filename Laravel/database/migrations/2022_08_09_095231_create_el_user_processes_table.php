<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElUserProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EL_USERPROCESS', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_form');
            $table->foreign('id_form')->references('id')->on('EL_FORMULAIRES');
            $table->integer('validUserEtape1_id');
            $table->foreign('validUserEtape1_id')->references('id')->on('D_UTILISATEUR');
            $table->integer('validUserEtape2_id');
            $table->foreign('validUserEtape2_id')->references('id')->on('D_UTILISATEUR');
            $table->integer('validUserEtape3_id');
            $table->foreign('validUserEtape3_id')->references('id')->on('D_UTILISATEUR');
            $table->integer('validUserEtape4_id');
            $table->foreign('validUserEtape4_id')->references('id')->on('D_UTILISATEUR');
            $table->integer('validUserEtape5_id');
            $table->foreign('validUserEtape5_id')->references('id')->on('D_UTILISATEUR');
            $table->integer('validUserEtape6_id');
            $table->foreign('validUserEtape6_id')->references('id')->on('D_UTILISATEUR');
            $table->integer('validUserEtape7_id');
            $table->foreign('validUserEtape7_id')->references('id')->on('D_UTILISATEUR');
            $table->integer('validUserEtape8_id');
            $table->foreign('validUserEtape8_id')->references('id')->on('D_UTILISATEUR');
            $table->integer('validUserEtape9_id');
            $table->foreign('validUserEtape9_id')->references('id')->on('D_UTILISATEUR');
            $table->integer('validUserEtape10_id');
            $table->foreign('validUserEtape10_id')->references('id')->on('D_UTILISATEUR');

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
        Schema::dropIfExists('EL_USERPROCESS');
    }
}
