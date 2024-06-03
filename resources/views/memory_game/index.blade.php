<!DOCTYPE html>
<html>
<head>
    <title>Juego de Memoria</title>
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
        #difficulty {
            margin-bottom: 20px;
        }
        #game-board {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 10px;
            justify-content: center;
            max-width: 450px;
        }
        .card {
            width: 100px;
            height: 100px;
            background-color: #ccc;
            cursor: pointer;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            display: none;
            width: 100%;
            height: 100%;
        }
        .card.flipped img {
            display: block;
        }
        .card.matched {
            background-color: #fff;
            cursor: default;
        }
        /* Estilos para los botones */
        .button-container {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .button-container a {
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 5px;
            display: inline-block;
            cursor: pointer;
        }
        .button-container a:hover {
            background-color: #0056b3;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Juego de Memoria</h1>
    <div>
        <label for="difficulty">Seleccionar Dificultad:</label>
        <select id="difficulty" name="difficulty" onchange="changeDifficulty()">
            <option value="easy" {{ $difficulty == 'easy' ? 'selected' : '' }}>Fácil</option>
            <option value="medium" {{ $difficulty == 'medium' ? 'selected' : '' }}>Medio</option>
            <!-- Agregar aquí más opciones de dificultad si es necesario -->
        </select>
    </div>
    <div id="game-board">
        @foreach ($cards as $card)
            <div class="card" data-card-id="{{ $loop->index }}">
                <img src="{{ asset($card->image_path) }}" alt="Card Image">
            </div>
        @endforeach
    </div>
    <div class="button-container">
        <a href="{{ route('memory_game.scores') }}" class="btn">Ver Puntajes</a>
        <a href="{{ route('home') }}" class="btn">Volver al Menú</a>
    </div>

    <script>
        function changeDifficulty() {
            const difficulty = document.getElementById('difficulty').value;
            window.location.href = `?difficulty=${difficulty}`;
        }

        $(document).ready(function() {
            let flippedCards = [];
            let matchedCards = 0;
            let attempts = 0;
            const maxAttempts = 80;

            $('.card').on('click', function() {
                if ($(this).hasClass('flipped') || $(this).hasClass('matched') || flippedCards.length === 2) {
                    return;
                }
                $(this).addClass('flipped');
                flippedCards.push($(this));

                if (flippedCards.length === 2) {
                    attempts++;
                    const img1 = flippedCards[0].find('img').attr('src');
                    const img2 = flippedCards[1].find('img').attr('src');
                    
                    if (img1 === img2) {
                        flippedCards[0].addClass('matched');
                        flippedCards[1].addClass('matched');
                        matchedCards += 2;
                        flippedCards = [];
                        
                        if (matchedCards === $('.card').length) {
                            const playerName = prompt('¡Has ganado! Introduce tu nombre:');
                            if (playerName) {
                                saveScore(attempts, playerName);
                            } else {
                                alert('No se ha guardado el puntaje, no se ingresó un nombre.');
                            }
                        }
                    } else {
                        setTimeout(function() {
                            flippedCards[0].removeClass('flipped');
                            flippedCards[1].removeClass('flipped');
                            flippedCards = [];
                        }, 1000);
                    }
                }

                if (attempts >= maxAttempts) {
                    if (matchedCards < $('.card').length) {
                        alert('¡Has perdido! Has alcanzado el número máximo de intentos.');
                        location.reload(); 
                    }
                }
            });

            function saveScore(score, playerName) {
                $.ajax({
                    url: '{{ route('memory_game.save_score') }}',
                    method: 'POST',
                    data: {
                        score: score,
                        playerName: playerName, 
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Puntaje guardado con éxito');
                        } else {
                            alert('Hubo un error al guardar el puntaje: ' + response.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Hubo un error al guardar el puntaje: ' + error);
                    }
                });
            }
        });
    </script>
</body>
</html>