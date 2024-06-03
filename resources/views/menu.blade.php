<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        a {
            display: block;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Menú Principal</h1>
        <ul>
            <li><a href="{{ route('tasks.index') }}">Lista De Tareas</a></li>
            <li><a href="{{ route('tip_calculator.index') }}">Calculadora De Propinas</a></li>
            <li><a href="{{ route('password.index') }}">Generador De Contraseñas</a></li>
            <li><a href="{{route('expenses.create')}}">Gestor de Gastos</a></li> 
            <li><a href="{{route('reservations.index')}}">Sistema De Reservas</a></li>
            <li><a href="{{route('gnotes.navigation')}}">Gestor De Notas</a></li>
            <li><a href="{{route('events.index')}}">Calendario De Eventos</a></li>
            <li><a href="{{route('memory_game.index')}}">Juego De memoria</a></li>
            <li><a href="{{route('stopwatch.index')}}">Cronometro Online</a></li>
        </ul>
    </div>

   