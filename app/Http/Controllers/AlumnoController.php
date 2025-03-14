<?php
// filepath: d:\Marianela\UTNPay\app\Http\Controllers\AlumnoController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AlumnosImport;

class AlumnoController extends Controller
{
    public function index()
    {
        return view('alumnos.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required',
            'apellido' => 'required',
            'nombre' => 'required',
            'telefono' => 'required',
            'curso' => 'required',
        ]);

        Alumno::create($request->all());

        return redirect()->route('alumnos.index')->with('success', 'Alumno guardado exitosamente.');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new AlumnosImport, $request->file('file'));

        return redirect()->route('alumnos.index')->with('success', 'Alumnos importados exitosamente.');
    }
}