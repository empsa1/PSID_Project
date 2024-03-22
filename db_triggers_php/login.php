<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "PISID_G14";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
}

$conn->close();
?>