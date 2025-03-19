<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('docente')->nullable();
            $table->string('inscripción');
            $table->string('duracion');
            $table->string('modalidad');
            $table->string('fecha_hora');
            $table->string('fecha_inicio');
            $table->string('arancel_total');
            $table->string('arancel_cuota');
            $table->integer('mes_inicio');
            $table->integer('cant_meses');
    
         
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};
