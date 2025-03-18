<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnoXCurso extends Model
{
    use HasFactory;

    protected $table = 'alumnoxcurso'; // Nombre de la tabla intermedia

    public $timestamps = false; // Desactivar timestamps si no los necesitas

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'alumno_id',
        'curso_id',
        'estado', // Campo adicional en la tabla intermedia
    ];

    // Relación con el modelo Alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }

    // Relación con el modelo Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
}