<?php
require_once("../db.php");

$id_especialidad = isset($_GET['id_especialidad']) ? (int) $_GET['id_especialidad'] : 0;

$stmt = $conn->prepare("SELECT id, nombre FROM doctores WHERE id_especialidad = ?");
$stmt->bind_param("i", $id_especialidad);
$stmt->execute();
$result = $stmt->get_result();

$doctores = [];
while ($row = $result->fetch_assoc()) {
  $doctores[] = $row;
}

header('Content-Type: application/json');
echo json_encode($doctores);
?>
