<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffectFormUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EL_AFFECTFORMUSERS', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_form');
            $table->foreign('id_form')->references('id')->on('EL_FORMULAIRES');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('D_UTILISATEUR');
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
        Schema::dropIfExists('El_AFFECTFORMUSERS');
    }
}
