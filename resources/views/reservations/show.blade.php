<!-- resources/views/reservations/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Reservation Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }
        .button-container button {
            margin-right: 10px;
        }
    </style>
    <script>
        function showMessage() {
            var confirmationMessage = document.getElementById('confirmation-message');
            confirmationMessage.style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h1>Reservation Details</h1>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td>{{ $reservation->customer_name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $reservation->customer_email }}</td>
            </tr>
            <tr>
                <th>Service</th>
                <td>{{ $reservation->service->name }}</td>
            </tr>
            <tr>
                <th>Reservation Time</th>
                <td>{{ $reservation->reservation_time }}</td>
            </tr>
        </table>
        <div class="button-container">
            <button onclick="showMessage()" class="btn btn-success">Confirmar Reserva</button>
            <div id="confirmation-message" style="display: none;" class="alert alert-success">
                Su reserva se ha confirmado con éxito.
            </div>
            <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</body>
</html>
