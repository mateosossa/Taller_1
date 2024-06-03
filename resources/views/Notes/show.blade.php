<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Nota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #fff;
            text-align: center;
        }
        p {
            color: #ccc;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            margin-right: 10px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $note->title }}</h1>
        <p>{{ $note->content }}</p>
        <p>Categoría: {{ $note->category->name }}</p>
        <div class="btn-container">
            <a href="{{ route('notes.edit', $note->id) }}" class="btn">Editar</a>
            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn" onclick="return confirm('¿Estás seguro de que deseas eliminar esta nota?')">Eliminar</button>
            </form>
        </div>
    </div>
</body>
</html>
