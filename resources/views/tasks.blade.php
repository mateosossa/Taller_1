<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tareas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #fff;
        }
        form {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
            color: #fff;
            display: flex;
            align-items: center;
        }
        span {
            margin-left: 10px;
            flex: 1;
        }
        button[type="submit"].delete {
            background-color: #dc3545;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Tareas</h1>

        <!-- Formulario para agregar nuevas tareas -->
        <form action="{{ url('/tasks') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nombre de la tarea" required>
            <button type="submit">Agregar Tarea</button>
        </form>

        <!-- Lista de tareas -->
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <!-- Checkbox para marcar como completada -->
                    <input type="checkbox" {{ $task->completed ? 'checked' : '' }} onchange="updateTaskStatus({{ $task->id }})">
                    <!-- Nombre de la tarea -->
                    <span>{{ $task->name }}</span>
                    <!-- Botón para eliminar la tarea -->
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete">Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        // Función para enviar una solicitud PUT cuando se marca/desmarca una tarea como completada
        function updateTaskStatus(taskId) {
            fetch(`/tasks/${taskId}`, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
        }
    </script>
</body>
</html>
