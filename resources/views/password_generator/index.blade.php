<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Contraseñas Seguras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
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
            color: #fff;
        }
        form {
            margin-top: 20px;
            background-color: #333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #fff;
        }
        input[type="number"], input[type="checkbox"] {
            margin-bottom: 10px;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Generador de Contraseñas Seguras</h1>
        <form action="{{ route('password.generate') }}" method="POST">
            @csrf
            <label for="length">Longitud:</label>
            <input type="number" name="length" value="12" required><br>
            <label for="include_uppercase">
                <input type="checkbox" name="include_uppercase" id="include_uppercase">
                Incluir Mayúsculas
            </label><br>
            <label for="include_numbers">
                <input type="checkbox" name="include_numbers" id="include_numbers">
                Incluir Números
            </label><br>
            <label for="include_symbols">
                <input type="checkbox" name="include_symbols" id="include_symbols">
                Incluir Símbolos
            </label><br>
            <button type="submit">Generar Contraseña</button>
        </form>
    </div>
</body>
</html>
