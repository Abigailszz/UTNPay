<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistorialPago;
use App\Models\Alumno;
use App\Models\Curso;
use Barryvdh\DomPDF\Facade\Pdf;

class HistorialPagosController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'curso_id' => 'required|exists:cursos,id',
            'fecha_pago' => 'required|date',
            'monto' => 'required|numeric|min:0',
        ]);

        // Guardar el pago en la base de datos
        HistorialPago::create($validated);

        return response()->json(['message' => 'Pago registrado exitosamente']);
    }

    public function getHistorialPorCurso($alumnoId, $cursoId)
    {
        $alumno = Alumno::findOrFail($alumnoId);
        $curso = Curso::findOrFail($cursoId);

        $pagos = $alumno->pagos()->where('curso_id', $cursoId)->get();

        return response()->json([
            'alumno' => $alumno,
            'curso' => $curso,
            'pagos' => $pagos,
        ]);
    }
   
    public function generarPDF($alumnoId, $cursoId)
    {
        $alumno = Alumno::findOrFail($alumnoId);
        $curso = Curso::findOrFail($cursoId);
        $pagos = $alumno->pagos()->where('curso_id', $cursoId)->get();
    
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.historial', compact('alumno', 'curso', 'pagos'));
        return $pdf->download('historial_pagos.pdf');
    }
}
