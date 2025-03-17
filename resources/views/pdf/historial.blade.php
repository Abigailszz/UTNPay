<!DOCTYPE html>
<html>
<head>
    <title>Historial de Pagos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Historial de Pagos</h1>
    <h3>Alumno: {{ $alumno->nombre }} {{ $alumno->apellido }}</h3>
    <p>DNI: {{ $alumno->dni }} | Legajo: {{ $alumno->id }}</p>
    <h4>Curso: {{ $curso->nombre }}</h4>

    <table>
        <thead>
            <tr>
                <th>Fecha de Pago</th>
                <th>Monto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pagos as $pago)
            <tr>
                <td>{{ $pago->fecha_pago }}</td>
                <td>{{ $pago->monto }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>