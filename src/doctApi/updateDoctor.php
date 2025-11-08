<?php
require_once '../db.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'] ?? null;
$imagen = $_POST['imagen'] ?? null;
$id_especialidad = $_POST['id_especialidad'] ?? null;

// Obtener datos actuales
$stmt = $conn->prepare("SELECT * FROM doctores WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$doctor = $stmt->get_result()->fetch_assoc();

if (!$doctor) {
  die("❌ Doctor no encontrado");
}

// Mantener datos anteriores si no se actualizan
$nombre = $nombre ?: $doctor['nombre'];
$imagen = $imagen ?: $doctor['imagen'];
$id_especialidad = $id_especialidad ?: $doctor['id_especialidad'];

$stmt = $conn->prepare("UPDATE doctores SET nombre = ?, imagen = ?, id_especialidad = ? WHERE id = ?");
$stmt->bind_param("ssii", $nombre, $imagen, $id_especialidad, $id);
$stmt->execute();

header("Location: ../../view/doctorView/doctores.php");
exit();
?>
