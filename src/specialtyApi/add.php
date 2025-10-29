<?php
require("../db.php");

$id = $_POST['id'];
$name = $_POST['name'];
$typeAction = "agregar";
$typeQuery = "INSERT INTO specialty (name) VALUES ('$name')";

if (!empty($id)){
    $typeAction = "editar";
    $typeQuery = "UPDATE specialty SET name='$name' WHERE id=$id";
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

