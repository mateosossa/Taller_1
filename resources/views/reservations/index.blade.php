<!-- resources/views/reservations/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Reservations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Available Services</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->description }}</td>
                    <td>
                        <form action="{{ route('reservations.create', $service->id) }}" method="GET" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-primary">Reserve</button>
                        </form>
                        @if(!$service->reservations->isEmpty())
                            <a href="{{ route('reservations.show', $service->reservations->first()->id) }}" class="btn btn-info ml-2">View reserve</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
