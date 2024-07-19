<?php
session_start();
include 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = $row['user_type'];
            
            if ($_SESSION['user_type'] == 'admin') {
                header("Location: dashboard.php");
            } else {
                session_start();
        $_SESSION['username'] = $username;
        
        // Redirect to the home page
        header("Location: categories.php");
        exit();
            }
        } else {
            $message = "Invalid password";
        }
    } else {
        $message = "User not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
    <style>
        .success {
            color: green;
        }
        body {
            background-color: black;
            padding: 0px;
        }

        h1 {
            display: inline;
            color: black;
            margin-left: 100px;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-left: 20px;
            font-size: 23px;
        }

        nav ul li a {
            text-decoration: none;
            color:black;
            
        }

        nav ul li a:hover {
            text-decoration: underline;
        }
        </style>
</head>
<body>
<header style="background-color: white; margin-top: 10px;">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.php" style="margin-left:-90px"><h1>RENTAL</h1></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav" >
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="scrollToAbout()">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="scrollToVehicles()">Vehicles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="scrollToReviews()">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="scrollToFeedback()">Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a href="register.php"><button class="btn btn-outline-danger btn-sm">Signup</button></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="container1">
        <div class="form-container">
            <div class="header">
                <h2>Register</h2>
            </div>
            <?php 
            if (!empty($message)) {
                echo "<p class='success' style=color:>" . $message . "</p>";
            }
            ?>
            <form action="login.php" method="post">
                Username: <input type="text" name="username"><br>
                Password: <input type="password" name="password"><br>
                <input type="submit" value="Login"
                <?php 
                          if (isset($_SESSION['username'])) {
                              echo $_SESSION['username'];
                          } else {
                              echo 'Signup';
                          }
                          ?>>
            </form>
            <p style="display:flex;justify-content:center;font-size:20px;">No Account? <a href="register.php">Signup</a></p>
        </div>
        <div class="image-container">
             <img src="https://static.toiimg.com/photo/80387978.cms" alt="Car Image" style="height:500px">
        </div>
    </div> 
    <footer class="bg-dark text-white mt-5" style="padding-left:35px">
    <div class="container-fluid w-100">
        <div class="row">
            <!-- About Us -->
            <div class="col-md-4 text-center">
                <h5 style="text-decoration:underline">About Us</h5>
                <p>We are a leading car rental service committed to providing quality vehicles and exceptional customer service.</p>
            </div>
            
            <!-- Contact Information -->
            <div class="col-md-4 text-center">
                <h5 style="text-decoration:underline">Contact Us</h5>
                <p><i class="fa fa-phone"></i> Phone: +123 456 7890</p>
                <p><i class="fa fa-envelope"></i> Email: info@example.com</p>
            </div>
            
            <!-- Social Media Links -->
            <div class="col-md-4 text-center">
                <h5 style="text-decoration:underline">Follow Us</h5>
                <a href="#" class="text-white mr-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-white mr-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white mr-2"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        
        <!-- Copyright -->
        <div class="row mt-3">
            <div class="col-md-12 text-center">
                <p>&copy; 2024 Your Company Name. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
>
