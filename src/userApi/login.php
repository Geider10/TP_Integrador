<?php
require("../db.php");
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$userExistsQuery =  "SELECT * FROM user WHERE email = '$email'";
$result = $conn->query($userExistsQuery);

if ($result->num_rows === 0) {
    die("El email no está registrado.");
}

$user = $result->fetch_assoc();

if ($password !== $user['password']) {
    die("Contraseña incorrecta.");
}

$_SESSION["user_id"] = $user['id'];
$_SESSION["user_name"] = $user['name'];
$_SESSION["user_lastName"] = $user['last_name'];
$_SESSION["user_email"] = $user['email'];
$_SESSION["user_role"] = $user['id_role'];


header("Location: ../../view/index.php");
exit();
$conn->close();
?>