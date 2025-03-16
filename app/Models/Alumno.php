<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos'; // Nombre de la tabla en la base de datos

    // Agregar los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'correo', // Agregar el campo 'correo' aquí
    ];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'alumnoxcurso', 'alumno_id', 'curso_id')
                    ->withPivot('estado'); // Incluir el campo 'estado' de la tabla intermedia
    }

    public function pagos()
    {
        return $this->hasMany(HistorialPago::class);
    }
}