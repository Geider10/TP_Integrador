<?php
require_once("../db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_especialidad = $_POST["id_especialidad"] ?? null;
    $id_doctor = $_POST["id_doctor"] ?? null;
    $paciente = trim($_POST["paciente"] ?? '');
    $fecha = $_POST["fecha"] ?? null;
    $hora = $_POST["hora"] ?? null;

    if ($id_especialidad && $id_doctor && $paciente && $fecha && $hora) {
        $stmt = $conn->prepare("INSERT INTO turnos (id_especialidad, id_doctor, paciente, fecha, hora) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iisss", $id_especialidad, $id_doctor, $paciente, $fecha, $hora);

        if ($stmt->execute()) {
            echo "<script>alert('Turno guardado correctamente'); window.location.href='../../view/turnView/listar_turnos.php';</script>";
        } else {
            echo "<script>alert('Error al guardar el turno'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Complete todos los campos'); window.history.back();</script>";
    }
}
?>
