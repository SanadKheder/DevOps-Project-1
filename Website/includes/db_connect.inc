<?php
$servername = "mysql-service"; // This matches the Service name in YAML
$username   = "root";
$password   = "rootpassword";  // Matches the YAML password
$db         = "website";       // Matches the YAML database

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>