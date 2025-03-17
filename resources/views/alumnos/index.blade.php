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
        <div class=" flex-grow-1 custom-padding p-4">
            <h1>Alumnos</h1>
            <!-- Formulario para ingresar datos del alumno -->
            <form action="{{ route('alumnos.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf
                <div class="">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni" required>
                </div>
                <div class="">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <div class="">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div>
                    <label for="correo" class="form-label">Email</label>
                    <input type="correo" class="form-control" id="correo" name="correo" required>
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
        </div>
    </div>
</body>
</html>