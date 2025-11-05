<?php
require("../../src/db.php"); // ajustá la ruta si tu db.php está en otro lugar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    $especialidad = $_POST['especialidad'];
    $imagen = $_POST['imagen'];

    $stmt = $conn->prepare("INSERT INTO doctores (nombre, especialidad, imagen) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $especialidad, $imagen);

    if ($stmt->execute()) {
        header ("Location: ../../view/doctorView/doctores.php"); // vuelve al listado
        exit();
    } else {
        echo "Error al guardar el doctor: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Método no permitido.";
}
?>
