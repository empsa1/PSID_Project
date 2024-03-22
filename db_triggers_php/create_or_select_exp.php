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
    $action = $_POST["action"];
    if ($action == "create") {
        header("Location: create_experiment.html");
        exit;
    } elseif ($action == "select") {
        header("Location: select_experiment.php");
        exit;
    }
}

$conn->close();
?>