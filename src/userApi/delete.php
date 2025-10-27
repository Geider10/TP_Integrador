<?php
require("../db.php");
session_start();

$id = $_GET['id'];
$deleteQuery = "DELETE FROM user WHERE id=$id";
$result = $conn->query($deleteQuery);

if ($result) {
    session_destroy();
    header("Location: ../../view/index.php");
    exit;
} else {
    echo "Error al eliminar: " . $conn->error;
}

$conn->close();
?>
