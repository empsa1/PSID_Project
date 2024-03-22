<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "PISID_G14";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["experiment_id"])) {
    $experiment_id = $_GET["experiment_id"];

    $sql = "SELECT * FROM Experiencia WHERE IDExperiencia = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $experiment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Experiment Details</title>
        </head>
        <body>
            <h2>Edit Experiment Details</h2>
            <form action="update_experiment.php" method="post">
                <label for="descricao">Description:</label><br>
                <input type="text" id="descricao" name="descricao" value="<?php echo $row['Descricao']; ?>"><br>
                <input type="hidden" name="experiment_id" value="<?php echo $experiment_id; ?>">
                <input type="submit" value="Update">
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Experiment not found.";
    }

    $stmt->close();
    $conn->close();
}
?>