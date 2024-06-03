<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Edit Event</h1>

        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $event->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="start_time">Start Time</label>
                <input type="datetime-local" name="start_time" id="start_time" class="form-control" value="{{ $event->start_time->format('Y-m-d\TH:i') }}" required>
            </div>
            <div class="form-group">
                <label for="end_time">End Time</label>
                <input type="datetime-local" name="end_time" id="end_time" class="form-control" value="{{ $event->end_time->format('Y-m-d\TH:i') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
        <br>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</body>
</html>
