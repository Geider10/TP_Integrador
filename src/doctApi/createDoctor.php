<?php
require_once("../../src/db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = trim($_POST["nombre"]);
    $imagen = trim($_POST["imagen"]);
    $id_especialidad = $_POST["id_especialidad"];

    if (empty($nombre) || empty($imagen) || empty($id_especialidad)) {
        die("⚠️ Todos los campos son obligatorios.");
    }

    $sql = "INSERT INTO doctores (nombre, imagen, id_especialidad) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nombre, $imagen, $id_especialidad);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Doctor creado correctamente'); window.location.href='../../view/doctorView/doctores.php';</script>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
