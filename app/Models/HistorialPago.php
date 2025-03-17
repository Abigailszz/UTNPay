<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialPago extends Model
{
    use HasFactory;

    protected $table = 'historial_pagos';

    protected $fillable = [
        'alumno_id',
        'curso_id',
        'fecha_pago',
        'monto',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
