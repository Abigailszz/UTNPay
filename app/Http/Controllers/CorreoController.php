<?php
namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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
                    Log::info("Enviando correo a: {$alumno->correo} sobre el curso: {$curso->nombre}");
                    try {
                        Mail::raw("Estimado/a {$alumno->nombre} {$alumno->apellido},\n\nLe recordamos que tiene deudas pendientes en el curso: {$curso->nombre}.", function ($message) use ($alumno) {
                            $message->to($alumno->correo)
                                    ->subject('Aviso de Deuda - UTNPay');
                        });
                    } catch (\Exception $e) {
                        Log::error("Error al enviar correo a {$alumno->correo}: " . $e->getMessage());
                    }
                }
            }
        }
        return response()->json(['message' => 'Correos enviados correctamente a todos los alumnos con deudas.']);
    }
}