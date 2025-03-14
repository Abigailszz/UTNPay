<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\AlertaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
Route::post('/alumnos', [AlumnoController::class, 'store'])->name('alumnos.store');
Route::post('/alumnos/import', [AlumnoController::class, 'import'])->name('alumnos.import');

Route::get('/pagos', [PagoController::class, 'index'])->name('pagos.index');
Route::get('/alertas', [AlertaController::class, 'index'])->name('alertas.index');
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');