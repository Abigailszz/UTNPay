@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Alumnos</h1>
    <!-- Formulario para ingresar datos del alumno -->
    <form action="{{ route('alumnos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" required>
        </div>
        <div class="mb-3">
            <label for="curso" class="form-label">Curso</label>
            <input type="text" class="form-control" id="curso" name="curso" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <!-- Botón para importar planilla Excel -->
    <form action="{{ route('alumnos.import') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Importar Planilla Excel</label>
            <input type="file" class="form-control" id="file" name="file" accept=".xlsx, .xls" required>
        </div>
        <button type="submit" class="btn btn-secondary">Importar</button>
    </form>
</div>
@endsection
