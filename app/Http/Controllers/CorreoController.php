<?php
namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    public function enviarATodos()
    {
        $alumnos = Alumno::whereHas('cursos', function ($query) {
            $query->whereIn('estado', ['proximo a vencer', 'vencido']);
        })->get();

        foreach ($alumnos as $alumno) {
            foreach ($alumno->cursos as $curso) {
                if (in_array($curso->pivot->estado, ['proximo a vencer', 'vencido'])) {
                    try {
                        Mail::raw("Estimado/a {$alumno->nombre} {$alumno->apellido},\n\nLe recordamos que tiene deudas pendientes en el curso: {$curso->nombre}.\n\nA ver si empezamos a pagar mamita", function ($message) use ($alumno) {
                            $message->to($alumno->correo)
                                    ->subject('Aviso de Deuda - UTNPay');
                        });
                    } catch (\Exception $e) {
                        // Puedes registrar el error si es necesario
                    }
                }
            }
        }

        return response()->json(['message' => 'Correos enviados correctamente a todos los alumnos con deudas.']);
    }
}