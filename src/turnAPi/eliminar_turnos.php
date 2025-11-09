<?php
require_once("../../src/db.php");

if (!isset($_GET['id'])) {
    die("Falta el ID del turno");
}

$id = intval($_GET['id']);

$stmt = $conn->prepare("DELETE FROM turnos WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: ../../view/turnView/Listar_turnos.php");
    exit;
} else {
    echo "Error al eliminar turno.";
}
