<?php
include("../db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_especialidad = $_POST["especialidad"];
    $id_doctor = $_POST["doctor"];
    $paciente = trim($_POST["paciente"]);
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

    if ($id_especialidad && $id_doctor && $paciente && $fecha && $hora) {
        $sql = "INSERT INTO turnos (id_doctor, id_especialidad, paciente, fecha, hora)
                VALUES ('$id_doctor', '$id_especialidad', '$paciente', '$fecha', '$hora')";
        if ($conn->query($sql)) {
            header("Location: ../view/Solicitar_turnos.html?success=1");
        } else {
            echo "Error al guardar: " . $conn->error;
        }
    } else {
        echo "Complete todos los campos.";
    }
}
?>
