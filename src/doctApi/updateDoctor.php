<?php
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);

    // Buscar el registro actual
    $query = $conn->prepare("SELECT * FROM doctores WHERE id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows === 0) {
        die("Error: Doctor no encontrado.");
    }

    $doctorActual = $result->fetch_assoc();

    // Mantener valores anteriores si no se envían nuevos
    $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : $doctorActual['nombre'];
    $especialidad = !empty($_POST['especialidad']) ? $_POST['especialidad'] : $doctorActual['especialidad'];
    $imagen = !empty($_POST['imagen']) ? $_POST['imagen'] : $doctorActual['imagen'];

    // Actualizar con los nuevos datos
    $update = $conn->prepare("UPDATE doctores SET nombre = ?, especialidad = ?, imagen = ? WHERE id = ?");
    $update->bind_param("sssi", $nombre, $especialidad, $imagen, $id);

    if ($update->execute()) {
        header("Location: ../../view/doctorView/doctores.php?mensaje=actualizado");
        exit;
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}
?>
