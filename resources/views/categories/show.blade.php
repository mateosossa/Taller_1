<!-- resources/views/categories/show.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas en {{ $category->name }}</title>
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
        .btn-volver {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-volver:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Notas en {{ $category->name }}</h1>
        <a href="{{ route('categories.index') }}" class="btn-volver">Volver</a>
        @foreach($notes as $note)
        <div class="note">
            <h2>{{ $note->title }}</h2>
            <p>{{ $note->content }}</p>
        </div>
        @endforeach
    </div>
</body>
</html>
