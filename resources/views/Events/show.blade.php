<!DOCTYPE html>
<html>
<head>
    <title>Event Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>{{ $event->title }}</h1>
        <p>{{ $event->description }}</p>
        <p>Start Time: {{ $event->start_time }}</p>
        <p>End Time: {{ $event->end_time }}</p>
        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</body>
</html>
