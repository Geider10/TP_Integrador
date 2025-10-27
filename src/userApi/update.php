<?php
require("../db.php");
session_start();

$id = $_POST['id'];
$name = $_POST['name'];
$lastName = $_POST['last_name'];

$updateQuery = "UPDATE user SET name='$name', last_name='$lastName' WHERE id=$id";
$result = $conn->query($updateQuery);

if ($result) {
    $_SESSION["user_name"] = $name;
    $_SESSION["user_lastName"] = $lastName;
    header("Location: ../../view/userView/profile.php");
    exit;
} else {
    echo "Error al actualizar: " . $conn->error;
}

$conn->close();
?>
