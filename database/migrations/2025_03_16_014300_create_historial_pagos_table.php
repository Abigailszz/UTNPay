<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_pagos', function (Blueprint $table) { // Sin espacio extra
            $table->id(); // ID del pago
            $table->unsignedBigInteger('alumno_id'); // ID del alumno
            $table->unsignedBigInteger('curso_id'); // ID del curso
            $table->date('fecha_pago'); // Fecha del pago
            $table->decimal('monto', 10, 2); // Monto del pago
            $table->timestamps();
    
            // Llaves foráneas
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_pagos'); // Nombre correcto de la tabla
    }
}