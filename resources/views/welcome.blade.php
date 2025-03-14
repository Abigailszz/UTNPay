<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UTNPay</title>

    <!-- Bootstrap CSS (si usas Bootstrap) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Incluir la barra de navegación -->
    @include('navbar')


    <div class="container mt-5 text-center">
        <h1>Bienvenido a UTNPay</h1>
    </div>

</body>
</html>
