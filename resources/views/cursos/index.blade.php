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
            <h1>Cursos Disponibles</h1>
            <table class="table table-striped mt-4">
                <thead>
                    <tr>
                        <th>Nombre del Curso</th>
                        <th>Docente</th>
                        <th>Inscripción</th>
                        <th>Duración</th>
                        <th>Modalidad</th>
                        <th>Fecha y Hora</th>
                        <th>Fecha de Inicio</th>
                        <th>Arancel Total</th>
                        <th>Arancel por Cuota</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                    <tr>
                        <td>{{ $curso->nombre }}</td>
                        <td>{{ $curso->docente }}</td>
                        <td>{{ $curso->inscripción }}</td>
                        <td>{{ $curso->duracion }}</td>
                        <td>{{ $curso->modalidad }}</td>
                        <td>{{ $curso->fecha_hora }}</td>
                        <td>{{ $curso->fecha_inicio }}</td>
                        <td>{{ $curso->arancel_total }}</td>
                        <td>{{ $curso->arancel_cuota }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#inscribirModal" data-curso-id="{{ $curso->id }}">Inscribir</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para inscribir alumno -->
    <div class="modal fade" id="inscribirModal" tabindex="-1" aria-labelledby="inscribirModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inscribirModalLabel">Inscribir Alumno</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="inscribirForm" action="{{ route('alumnoxcurso.store') }}" method="POST">
                        @csrf
                        <input type="hidden" id="curso_id" name="curso_id">
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI del Alumno</label>
                            <input type="text" class="form-control" id="dni" name="dni" required>
                        </div>
                        <div id="alumnoDatos" style="display: none;">
                            <p><strong>Nombre:</strong> <span id="alumnoNombre"></span></p>
                            <p><strong>Apellido:</strong> <span id="alumnoApellido"></span></p>
                            <p><strong>Teléfono:</strong> <span id="alumnoTelefono"></span></p>
                            <p><strong>Email:</strong> <span id="alumnoEmail"></span></p>
                        </div>
                        <button type="submit" class="btn btn-primary">Inscribir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var inscribirModal = document.getElementById('inscribirModal');
            inscribirModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var cursoId = button.getAttribute('data-curso-id');
                var cursoIdInput = inscribirModal.querySelector('#curso_id');
                cursoIdInput.value = cursoId;
            });

            var dniInput = document.getElementById('dni');
            dniInput.addEventListener('blur', function () {
                var dni = dniInput.value;
                if (dni) {
                    fetch(`/alumnos/dni/${dni}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data) {
                                document.getElementById('alumnoNombre').textContent = data.nombre;
                                document.getElementById('alumnoApellido').textContent = data.apellido;
                                document.getElementById('alumnoTelefono').textContent = data.telefono;
                                document.getElementById('alumnoEmail').textContent = data.email;
                                document.getElementById('alumnoDatos').style.display = 'block';
                            } else {
                                document.getElementById('alumnoDatos').style.display = 'none';
                            }
                        });
                }
            });
        });
    </script>
</body>
</html>