<!-- resources/views/reservations/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Make a Reservation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Reserve {{ $service->name }}</h1>
        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="service_id" value="{{ $service->id }}">
            <div class="form-group">
                <label for="customer_name">Name</label>
                <input type="text" name="customer_name" class="form-control" id="customer_name" required>
            </div>
            <div class="form-group">
                <label for="customer_email">Email</label>
                <input type="email" name="customer_email" class="form-control" id="customer_email" required>
            </div>
            <div class="form-group">
                <label for="reservation_time">Reservation Time</label>
                <input type="datetime-local" name="reservation_time" class="form-control" id="reservation_time" required>
            </div>
            <button type="submit" class="btn btn-primary">Reserve</button>
        </form>
    </div>
</body>
</html>
