<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .alert {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
            text-align: center;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #fff;
        }
        input[type="text"],
        textarea,
        select {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            color: #333;
            margin-bottom: 10px;
        }
        button[type="submit"],
        .btn-ver-notas,
        .btn-crear-categoria {
            width: 48%;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            margin-right: 2%;
            margin-bottom: 10px;
        }
        .btn-ver-notas {
            background-color: #28a745;
        }
        .btn-crear-categoria {
            background-color: #53535393; /* Color amarillo */
        }
        button[type="submit"]:hover,
        .btn-ver-notas:hover,
        .btn-crear-categoria:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Crear Nueva Nota</h1>
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('notes.store') }}" method="POST">
        @csrf
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" required>
        <label for="content">Contenido:</label>
        <textarea id="content" name="content" rows="5" required></textarea>
        <label for="category_id">Categoría:</label>
        <select name="category_id" id="category_id" required>
            @if($categories->count() > 0)
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            @else
                <option value="" disabled>No hay categorías disponibles</option>
            @endif
        </select>
        <button type="submit">Crear Nota</button> 
        <a href="{{ route('notes.index') }}" class="btn-ver-notas">Ver Notas</a>
        <a href="{{ route('gnotes.navigation') }}" class="btn-crear-categoria">Volver</a>
    </form>
</html>
