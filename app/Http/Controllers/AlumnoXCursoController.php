<?php
// filepath: d:\Marianela\UTNPay\app\Http\Controllers\AlumnoXCursoController.php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\AlumnoXCurso;

class AlumnoXCursoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|exists:alumnos,dni',
            'curso_id' => 'required|exists:cursos,id',
        ]);

        $alumno = Alumno::where('dni', $request->dni)->first();
        AlumnoXCurso::create([
            'alumno_id' => $alumno->id,
            'curso_id' => $request->curso_id,
        ]);

        return redirect()->route('cursos.index')->with('success', 'Alumno inscrito correctamente.');
    }
}