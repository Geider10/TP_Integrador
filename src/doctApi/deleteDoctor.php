<?php
require_once '../db.php';

if (!isset($_POST['id']) || empty($_POST['id'])) {
    die("Error: no se recibió el ID del doctor.");
}

$id = $_POST['id'];

$sql = "DELETE FROM doctores WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: ../../view/doctorView/doctores.php");
    exit();
} else {
    die("Error al eliminar: " . $conn->error);
}
?>
