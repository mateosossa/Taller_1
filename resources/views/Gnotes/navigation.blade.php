<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Navegación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #fff;
            margin-bottom: 20px;
        }
        .nav-links a {
            display: block;
            padding: 10px 20px;
            margin: 10px auto;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            width: 50%;
            text-align: center;
            transition: background-color 0.3s;
        }
        .nav-links a:hover {
            background-color: #0056b3;
        }
        /* Estilo diferenciador para el botón Volver */
        .nav-links .btn-volver {
            background-color: #555;
            width: 20%;
            margin-top: 20px; /* Ajusta el margen superior para mantener la posición */
        }
        .nav-links .btn-volver:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Panel de Navegación</h1>
        <div class="nav-links">
            <a href="{{ route('notes.create') }}">Crear Nota</a>
            <a href="{{ route('notes.index') }}">Ver Notas</a>
            <a href="{{ route('categories.create') }}">Crear Categoría</a>
            <a href="{{ route('categories.index') }}">Buscar Notas</a>
            <a href="{{ route('home') }}" class="btn-volver">Volver</a>
        </div>
    </div>
</body>
</html>
