<?php
require_once("../db.php");

$id = $_POST['id'];
$paciente = $_POST['paciente'];
$id_doctor = $_POST['id_doctor'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

$stmt = $conn->prepare("UPDATE turnos SET paciente=?, id_doctor=?, fecha=?, hora=? WHERE id=?");
$stmt->bind_param("sissi", $paciente, $id_doctor, $fecha, $hora, $id);

if ($stmt->execute()) {
  header("Location: ../../view/turnView/listar_turnos.php");
} else {
  echo "Error al actualizar: " . $conn->error;
}
