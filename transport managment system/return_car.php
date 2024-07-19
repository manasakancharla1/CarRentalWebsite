<?php
session_start();
include 'db.php'; // Include your database connection

$message = '';

if (isset($_GET['return_id'])) {
    $return_id = $_GET['return_id'];
    
    // Fetch the car_id associated with the booking
    $fetchCarIdSql = "SELECT car_id FROM bookings WHERE id = '$return_id'";
    $result = $conn->query($fetchCarIdSql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $car_id = $row['car_id'];

        // Mark booking as returned
        $updateBookingSql = "UPDATE bookings SET returned = 1 WHERE id = '$return_id'";
        if ($conn->query($updateBookingSql) === TRUE) {
            
            // Increase the availability of the returned car
            $updateCarSql = "UPDATE cars SET available = available + 1 WHERE id = '$car_id'";
            if ($conn->query($updateCarSql) === TRUE) {
                $message = "Car returned successfully";
            } else {
                $message = "Error updating car availability: " . $conn->error;
            }

        } else {
            $message = "Error marking booking as returned: " . $conn->error;
        }
    } else {
        $message = "Booking not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Return Car</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Return Car</h2>
    <?php if (!empty($message)) { ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php } ?>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Car ID</th>
                <th>Date Booked</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM bookings WHERE username = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["car_id"] . "</td>";
                    echo "<td>" . $row["booking_date"] . "</td>";
                    echo '<td><a href="return_car.php?return_id=' . $row["id"] . '&car_id=' . $row["car_id"] . '" class="btn btn-primary">Return</a></td>';
                    echo "</tr>";
                }
            } else {
                echo '<tr><td colspan="4">No bookings found.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
