<?php
require("../db.php");

$id = $_POST['id'];

$deleteQuery = "DELETE FROM user WHERE id=$id";

if ($conn->query($deleteQuery) === TRUE) {
    header("Location: index.html"); // vuelve al inicio
    exit;
} else {
    echo "Error al eliminar: " . $conn->error;
}

$conn->close();
?>
