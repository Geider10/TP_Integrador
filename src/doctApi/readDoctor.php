<?php
require("../db.php");
$result = $conn->query("SELECT * FROM doctor");
$doctores = [];

while ($row = $result->fetch_assoc()) {
  $doctores[] = $row;
}

echo json_encode($doctores);
$conn->close();
?>
