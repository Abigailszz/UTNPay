<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UTNPay</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS personalizado -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

<div class="d-flex">
    @include('navbar')

    <div class="flex-grow-1 custom-padding p-4">
        <h1>ALERTA</h1>
        <button class="btn btn-danger" onclick="enviarATodos()">Enviar a Todos</button>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Legajo</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>DNI</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    @foreach ($alumno->cursos as $curso)
                        @if (in_array($curso->pivot->estado, ['proximo a vencer', 'vencido']))
                            <tr>
                                <td>{{ $alumno->id }}</td>
                                <td>{{ $alumno->nombre }}</td>
                                <td>{{ $alumno->apellido }}</td>
                                <td>{{ $alumno->dni }}</td>
                                <td>
    <span class="badge 
        @if ($curso->pivot->estado == 'vencido') bg-danger 
        @elseif ($curso->pivot->estado == 'proximo a vencer') bg-warning text-dark 
        @endif">
        {{ $curso->pivot->estado }}
    </span>
    <button class="btn btn-sm btn-primary ms-2" onclick="enviarCorreo('{{ $alumno->correo }}', '{{ $curso->nombre }}')">
    Enviar Correo
</button>
</td>
                            </tr>
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    function enviarATodos() {
    if (confirm('¿Estás seguro de que deseas enviar correos a todos los alumnos con deudas?')) {
        fetch(`/enviar-correos-todos`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al enviar los correos.');
            }
            return response.json();
        })
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            alert('Error: ' + error.message);
        });
    }
}
 function enviarCorreo(correoAlumno, cursoNombre) {
    if (confirm(`¿Estás seguro de que deseas enviar un correo al alumno con correo ${correoAlumno} sobre el curso "${cursoNombre}"?`)) {
        fetch(`/enviar-correo`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ correo: correoAlumno, curso_nombre: cursoNombre })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al enviar el correo.');
            }
            return response.json();
        })
        .then(data => {
            alert(data.message);
        })
        .catch(error => {
            alert('Error: ' + error.message);
        });
    }
}
</script>
</body>
</html>