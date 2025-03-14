<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">UTNPay</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<div class="d-flex">
    <div class="bg-primary p-3" id="navbarNav" style="min-width: 200px;">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('alumnos.index') }}">Alumnos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('cursos.index') }}">Cursos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('pagos.index') }}">Pagos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('alertas.index') }}">Alertas</a>
            </li>
        </ul>
    </div>
    <div class="flex-grow-1 p-3">
        <!-- Aquí va el contenido principal de la página -->
    </div>
</div>