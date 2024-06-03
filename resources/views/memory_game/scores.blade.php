<!DOCTYPE html>
<html>
<head>
    <title>Puntajes del Juego de Memoria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            color: #333;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .button-container {
            margin-top: 20px;
        }
        .button-container a {
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 5px;
            display: inline-block;
        }
        .button-container a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Puntajes del Juego de Memoria</h1>
    <table>
        <thead>
            <tr>
                <th>Jugador</th>
                <th>Puntaje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($scores as $score)
                <tr>
                    <td>{{ $score->player_name }}</td>
                    <td>{{ $score->score }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="button-container">
        <a href="{{ route('memory_game.index') }}">Volver al Juego</a>
        <a href="{{ route('home') }}">Volver al Menú</a>
    </div>
</body>
</html>
