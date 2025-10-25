<?php
require("../db.php");

$name = $_POST['name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$idRole = 2;

$userExistsQuery = "SELECT * FROM user where email =". "'$email'";
if ($conn->query($userExistsQuery) -> num_rows > 0) {
    echo "Email of user already exists";
    exit();
}

$passwordHash = password_hash($password, PASSWORD_BCRYPT);
$addQuery = "INSERT INTO user (name, last_name, email, password, id_role) VALUES ('$name', '$lastName', '$email', '$passwordHash', $idRole)";

if ($conn->query($addQuery)) {
    header("Location: ../../view/login.html");
}

$conn->close();
?>