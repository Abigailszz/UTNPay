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
        <!-- Menú a la izquierda -->
        @include('navbar')

        <!-- Contenido principal a la derecha -->
        <div class="flex-grow-1 custom-padding p-4">
            <h1>Gestión de Alumnos</h1>

            <!-- Formulario para registrar un nuevo alumno -->
            <form action="{{ route('alumnos.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="col-md-4">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" required>
                </div>
                <div class="col-md-4">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <div class="col-md-4">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="col-md-4">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div class="col-md-4">
                    <label for="correo" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>

            <!-- Botón para importar planilla Excel -->
            <form action="{{ route('alumnos.import') }}" method="POST" enctype="multipart/form-data" class="mt-4 row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="file" class="form-label">Importar Planilla Excel</label>
                    <input type="file" class="form-control" id="file" name="file" accept=".xlsx, .xls" required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-secondary">Importar</button>
                </div>
            </form>

            <!-- Buscador por DNI o Legajo -->
            <div class="mt-4">
                <input type="text" id="searchInput" class="form-control w-50" placeholder="Buscar por DNI o Legajo">
            </div>

            <!-- Tabla de alumnos y cursos -->
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>Legajo</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Cursos</th>
                    </tr>
                </thead>
                <tbody id="alumnosTableBody">
                    @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->id }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellido }}</td>
                        <td>{{ $alumno->dni }}</td>
                        <td>{{ $alumno->telefono }}</td>
                        <td>{{ $alumno->correo }}</td>
                        <td>
                            @if ($alumno->cursos->isNotEmpty())
                                <ul>
                                    @foreach ($alumno->cursos as $curso)
                                        <li>{{ $curso->nombre }} ({{ $curso->pivot->estado }})</li>
                                    @endforeach
                                </ul>
                            @else
                                Sin cursos
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Filtro de búsqueda por DNI o Legajo
        document.getElementById('searchInput').addEventListener('input', function() {
            const filter = this.value.toLowerCase().trim();
            const rows = document.querySelectorAll('#alumnosTableBody tr');

            rows.forEach(row => {
                const legajo = row.cells[0].textContent.toLowerCase();
                const dni = row.cells[3].textContent.toLowerCase();

                if (legajo.startsWith(filter) || dni.startsWith(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>