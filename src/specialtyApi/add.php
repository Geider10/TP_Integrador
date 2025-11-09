<?php
require("../db.php");

$id = $_POST['id'];
$name = $_POST['nombre'];
$typeAction = "agregar";
$typeQuery = "INSERT INTO especialidades (nombre) VALUES ('$name')";

if (!empty($id)){
    $typeAction = "editar";
    $typeQuery = "UPDATE especialidades SET nombre='$name' WHERE id=$id";
}

$result = $conn->query($typeQuery);
if ($result) {
    header("Location: ../../view/specialtyView/table.php");
    exit;
} else {
    echo "Error al agregar: " . $conn->error;
}
$conn->close();
?>