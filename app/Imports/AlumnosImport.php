<?php
// filepath: d:\Marianela\UTNPay\app\Imports\AlumnosImport.php
namespace App\Imports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\ToModel;

class AlumnosImport implements ToModel
{
    public function model(array $row)
    {
        return new Alumno([
            'dni' => $row[0],
            'apellido' => $row[1],
            'nombre' => $row[2],
            'telefono' => $row[3],
            'curso' => $row[4],
        ]);
    }
}