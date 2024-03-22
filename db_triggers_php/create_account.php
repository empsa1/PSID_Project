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
    $nomeUtilizador = $_POST["nomeUtilizador"];
    $sql = "INSERT INTO Utilizador (NomeUtilizador, TelefoneUtilizador, TipoUtilizador, EmailUtilizador) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $nomeUtilizador, $telefoneUtilizador, $tipoUtilizador, $emailUtilizador);
    if ($stmt->execute()) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}

$conn->close();
?>