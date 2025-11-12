<?php
require_once("../db.php");
session_start();

if (!isset($_SESSION["user_id"])) {
  die("Error: No hay sesión activa. Inicia sesión para continuar.");
}

$id = $_POST['id'];
$user_id = $_SESSION['user_id']; // 🔹 se obtiene desde la sesión, no desde el formulario
$id_doctor = $_POST['id_doctor'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

$stmt = $conn->prepare("UPDATE turnos SET id_user=?, id_doctor=?, fecha=?, hora=? WHERE id=?");
$stmt->bind_param("iissi", $user_id, $id_doctor, $fecha, $hora, $id);

if ($stmt->execute()) {
  header("Location: ../../view/userView/profile.php");
  exit();
} else {
  echo "Error al actualizar: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
