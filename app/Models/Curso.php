<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    protected $fillable = ['nombre', 'descripcion', 'profesor', 'fecha_hora'];

    // Relación con la tabla alumnoxcurso
    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumnoxcurso', 'curso_id', 'alumno_id')
                    ->withPivot('estado'); // Incluir el campo 'estado' de la tabla intermedia
    }
}