<!DOCTYPE html>
<html>
<head>
    <title>Eventos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Eventos</h1>
        
        @if ($events->isEmpty())
            <p>Todavía no hay eventos.</p>
        @else
            @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif

            <ul class="list-group mt-3">
                @foreach ($events as $event)
                    <li class="list-group-item">
                        <a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif

        <br>
        <a href="{{ route('events.create') }}" class="btn btn-primary">Crear Evento</a>
        <br>
        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Volver al Menú</a>

        
        <script>
            var now = new Date();
            var year = now.getFullYear();
            var month = (now.getMonth() + 1).toString().padStart(2, '0'); 
            var day = now.getDate().toString().padStart(2, '0'); 

            var currentDateTime = year + '-' + month + '-' + day + ' ' + now.getHours() + ':' + now.getMinutes();':00';

            @if ($events->isNotEmpty())
                var eventDateTime = '{{ $events->first()->date }}';


                if (currentDateTime === eventDateTime) {
                    alert("¡Recordatorio del evento '{{ $events->first()->title }}'!");
                }
            @endif
        </script>
    </div>
</body>
</html>
