<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno; // Importar el modelo Alumno

class PagoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all(); // Asegúrate de que esta consulta devuelve datos
        return view('pagos.index', compact('alumnos'));
    }

    public function getCursos($id)
    {
        // Buscar el alumno por su ID
        $alumno = Alumno::findOrFail($id);

        // Obtener los cursos relacionados con el estado desde la tabla intermedia
        $cursos = $alumno->cursos()->withPivot('estado')->get();

        // Retornar los cursos y el estado como JSON
        return response()->json($cursos);
    }
}