<?php
session_start();
include 'db.php'; // Include your database connection

$message = '';

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login page if user is not logged in
    exit;
}
$username = $_SESSION['username'];
$sql = "SELECT * FROM bookings WHERE username = '$username'";
$result = $conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $car_id = $_POST['car_id'];
  $username = $_SESSION['username'];

  // Insert booking into database
  $sql = "INSERT INTO bookings (username, car_id) VALUES ('$username', '$car_id')";
  
  if ($conn->query($sql) === TRUE) {
      $message = "Car booked successfully";
      
      // Decrease the availability of the booked car
      $updateSql = "UPDATE cars SET available = available - 1 WHERE id = '$car_id'";
      $conn->query($updateSql);
      
  } else {
      $message = "Error: " . $sql . "<br>" . $conn->error;
  }
}
// book car
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_id = $_POST['car_id'];
    $username = $_SESSION['username'];

    $sql = "INSERT INTO bookings (username, car_id) VALUES ('$username', '$car_id')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Car booked successfully";
        
        // Decrease the availability of the booked car
        $updateSql = "UPDATE cars SET available = available - 1 WHERE id = '$car_id'";
        $conn->query($updateSql);
        
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bookings</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Your Bookings</h2>
    <?php if (!empty($message)) { ?>
        <p class="message"><?php echo $message; ?></p>
    <?php } ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>car_id</th>
                <th>Date Booked</th>
                <th>Action</th>
                <th>return_id</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["car_id"] . "</td>";
                    echo "<td>" . $row["booking_date"] . "</td>";
                    echo '<td><a href="?return_id=' . $row["id"] . '&car_id=' . $row["car_id"] . '" class="btn btn-success">Return</a></td>';
                    echo "<td>" . $row["return_id"] . "</td>";
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
