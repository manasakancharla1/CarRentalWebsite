<?php
$servername = "localhost";
$username = "root";
$password = "manasa@0603";
$dbname = "transport_managment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

