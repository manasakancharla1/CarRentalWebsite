<?php
session_start();
include 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $user_id = $_SESSION['user_id'];
    $user_type = $_SESSION['user_type']; // Assuming 'admin' or 'user' as user types

    $sql = "SELECT password, user_type FROM users WHERE id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($current_password, $row['password'])) {
            if ($new_password == $confirm_password) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                if ($user_type == 'admin' && $row['user_type'] == 'admin') {
                    $update_sql = "UPDATE users SET password='$hashed_password' WHERE id='$user_id'";
                } else {
                    $message = "You do not have permission to change the password";
                }
                if ($conn->query($update_sql) === TRUE) {
                    $message = "Password changed successfully";
                } else {
                    $message = "Error updating password: " . $conn->error;
                }
            } else {
                $message = "New password and confirm password do not match";
            }
        } else {
            $message = "Incorrect current password";
        }
    } else {
        $message = "User not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="header">
                <h2>Change Password</h2>
            </div>
            <?php 
            if (!empty($message)) {
                echo "<p class='error'>" . $message . "</p>";
            }
            ?>
            <form action="change_password.php" method="post">
                Current Password: <input type="password" name="current_password" required><br>
                New Password: <input type="password" name="new_password" required><br>
                Confirm Password: <input type="password" name="confirm_password" required><br>
                <input type="submit" value="Change Password">
            </form>
        </div>
    </div>
</body>
</html>
