<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas las Notas</title>
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
        }
        h1 {
            color: #fff;
            text-align: center;
        }
        .note {
            margin-bottom: 20px;
            border-bottom: 1px solid #666;
            padding-bottom: 10px;
        }
        .note h2 {
            margin-top: 0;
        }
        .note p {
            color: #ccc;
        }
        .btn-editar,
        .btn-eliminar,
        .btn-volver {
            width: 5%;
            padding: 8px 8px;
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
        .btn-volver {
            background-color: #6c757d;
        }
        .btn-eliminar {
            padding: 10px 20px; /* Aumentar el tamaño del botón */
            background-color: #dc3545 !important; /* Color de fondo rojo */
        }
        .btn-editar {
            background-color: #28a745;
        }
        .btn-editar:hover,
        .btn-eliminar:hover,
        .btn-volver:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Todas las Notas</h1>
        @foreach($notes as $note)
        <div class="note">
            <h2>{{ $note->title }}</h2>
            <p>{{ $note->content }}</p>
            <p>Categoría: {{ $note->category->name }}</p>
            <div>
                <a href="{{ route('notes.edit', $note->id) }}" class="btn-editar">Editar</a>
                <form action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar esta nota?')">Eliminar</button>
                </form>
            </div>
        </div>
        @endforeach
        <a href="{{ route('gnotes.navigation') }}" class="btn-volver">Volver</a>
    </div>
</body>
</html>
