<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Notas</title>
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
            margin: 20px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #fff;
        }
        .category {
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        .category a {
            color: #007bff;
            text-decoration: none;
            font-size: 18px;
        }
        .category a:hover {
            color: #0056b3;
        }
        .btn-volver {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .btn-volver:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Buscar Notas por Categoría</h1>
        @foreach($categories as $category)
        <div class="category">
            <h2><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></h2>
        </div>
        @endforeach
        <a href="{{ route('gnotes.navigation') }}" class="btn-volver">Volver</a>
    </div>
</body>
</html>
