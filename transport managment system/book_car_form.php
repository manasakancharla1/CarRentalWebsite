<?php
session_start();
include 'db.php'; // Include your database connection

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login page if user is not logged in
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_id = $_POST['car_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $username = $_SESSION['username'];

    // Insert booking into database
    $sql = "INSERT INTO bookings (username, car_id, start_date, end_date) VALUES ('$username', '$car_id', '$start_date', '$end_date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Car booked successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Car</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Book a Car</h2>
    <form method="post" action="">
        <div class="mb-3">
            <label for="car_id" class="form-label">Select Car</label>
            <select class="form-select" name="car_id" id="car_id" required style="color:black;">
                <!-- Fetch cars from the database and populate the options -->
                <?php
                 $sql = "SELECT * FROM cars";
                 $result = $conn->query($sql);
                 while($row = $result->fetch_assoc()) {
                     echo '<option value="' . $row["id"] . '">' . $row["car_name"] .'</option>';
                 }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" name="start_date" id="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" name="end_date" id="end_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Book Car</button>
    </form>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
