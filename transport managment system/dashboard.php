<?php
include 'db.php';

// Get number of bookings
$sql_bookings = "SELECT COUNT(*) as total_bookings FROM bookings";
$result_bookings = $conn->query($sql_bookings);
$row_bookings = $result_bookings->fetch_assoc();
$total_bookings = $row_bookings['total_bookings'];

// Get number of users
$sql_users = "SELECT COUNT(*) as total_users FROM users WHERE user_type = 'user'";
$result_users = $conn->query($sql_users);
$row_users = $result_users->fetch_assoc();
$total_users = $row_users['total_users'];

echo "Welcome Admin!<br>";
echo "Total Bookings: " . $total_bookings . "<br>";
echo "Total Users: " . $total_users . "<br>";
echo "<a href='add_car_form.php'>Add Cars</a><br>";
echo "<a href='change_password.php'>Change Password</a><br>";
echo "<a href='logout.php'>Logout</a><br>";

$conn->close();
?>

