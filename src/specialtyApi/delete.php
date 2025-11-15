<?php
require("../db.php");
session_start();

$id = $_GET['id'];
$deleteQuery = "DELETE FROM especialidades WHERE id=$id";
$result = $conn->query($deleteQuery);

if ($result) {
    header("Location: ../../view/userView/profile.php");
    exit;
} else {
    echo "Error al eliminar: " . $conn->error;
}

$conn->close();
?>