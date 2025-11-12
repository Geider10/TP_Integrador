<?php
require_once("../db.php");

$id = $_POST['id'];
$id_user = $_POST['id_user'];
$id_doctor = $_POST['id_doctor'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

$stmt = $conn->prepare("UPDATE turnos SET id_user=?, id_doctor=?, fecha=?, hora=? WHERE id=?");
$stmt->bind_param("sissi",$id_user, $id_doctor, $fecha, $hora, $id);

if ($stmt->execute()) {
  header("Location: ../../view/userView/profile.php");
} else {
  echo "Error al actualizar: " . $conn->error;
}
