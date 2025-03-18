<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripciones de Alumnos por Curso</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS personalizado -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Menú a la izquierda -->
        @include('navbar')

        <!-- Contenido principal a la derecha -->
        <div class="flex-grow-1 custom-padding p-4">
            <h1>Inscripciones de Alumnos por Curso</h1>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Alumno</th>
                        <th>Curso</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnosPorCurso as $inscripcion)
                    <tr>
                        <td>{{ $inscripcion->id }}</td>
                        <td>{{ $inscripcion->alumno->nombre }} {{ $inscripcion->alumno->apellido }}</td>
                        <td>{{ $inscripcion->curso->nombre }}</td>
                        <td>{{ $inscripcion->estado ?? 'N/A' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>