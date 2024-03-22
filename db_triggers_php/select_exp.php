<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "PISID_G14";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$investigator_id = 1;

$sql = "SELECT IDExperiencia, Descricao FROM Experiencia WHERE Investigador = ? ORDER BY DataHora DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $investigator_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Select Experiment</h2>";
echo "<form action='edit_experiment_details.php' method='get'>";
echo "<select name='experiment_id'>";
while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['IDExperiencia'] . "'>" . $row['Descricao'] . "</option>";
}
echo "</select>";
echo "<input type='submit' value='Edit'>";
echo "</form>";

$stmt->close();
$conn->close();
?>