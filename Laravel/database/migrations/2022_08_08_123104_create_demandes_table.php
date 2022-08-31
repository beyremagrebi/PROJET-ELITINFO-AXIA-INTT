<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EL_DemandesProc', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('href');
            $table->foreign('href')->references('id')->on('LIST_FORMS');
            $table->bigInteger('id_doc');
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
        Schema::dropIfExists('EL_DemandesProc');
    }
}
