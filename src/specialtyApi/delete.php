<?php
require("../db.php");
session_start();

$id = $_GET['id'];
$deleteQuery = "DELETE FROM specialty WHERE id=$id";
$result = $conn->query($deleteQuery);

if ($result) {
    header("Location: ../../view/specialtyView/table.php");
    exit;
} else {
    echo "Error al eliminar: " . $conn->error;
}

$conn->close();
?>
