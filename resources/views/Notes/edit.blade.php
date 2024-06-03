<!-- resources/views/notes/edit.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nota</title>
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
            margin-bottom: 20px;
        }
        label {
            color: #fff;
        }
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            color: #333;
            margin-bottom: 10px;
        }
        button[type="submit"],
        .btn-volver {
            width: 49%;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            margin-right: 2%;
        }
        .btn-volver {
            background-color: #6c7d72;
        }
        button[type="submit"]:hover,
        .btn-volver:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Nota</h1>
        <form action="{{ route('notes.update', $note->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" id="title" name="title" value="{{ $note->title }}" required>
            </div>
            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea id="content" name="content" rows="5" required>{{ $note->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Categoría</label>
                <select id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if($note->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit">Guardar Cambios</button>
                <span>&nbsp;</span> 
                <a href="{{ route('gnotes.navigation') }}" class="btn-volver">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>
