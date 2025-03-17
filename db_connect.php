<?php
$host = "localhost";  // XAMPP default
$username = "root";   // Default user in XAMPP
$password = "";       // No password for root in XAMPP
$database = "job_portal"; // Database name

// Connect to MySQL
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
