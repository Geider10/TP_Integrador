<?php
require("../db.php");

$id = $_POST['id'];
$name = $_POST['name'];
$last_name = $_POST['last_name'];

$updateQuery = "UPDATE user SET name='$name', last_name='$last_name' WHERE id=$id";

if ($conn->query($updateQuery)) {
    header("Location: ../../view/getUser.php?id=$id");
    exit;
} else {
    echo "Error al actualizar: " . $conn->error;
}

$conn->close();
?>
