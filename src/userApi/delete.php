<?php
require("../db.php");

$id = $_POST['id'];

$deleteQuery = "DELETE FROM user WHERE id=$id";

if ($conn->query($deleteQuery)) {
    header("Location: ../../view/index.html");
    exit;
} else {
    echo "Error al eliminar: " . $conn->error;
}

$conn->close();
?>
