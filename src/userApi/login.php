<?php
require("../db.php");

$email = $_POST['email'];
$password = $_POST['password'];

$userExistsQuery = "SELECT * FROM user where email =". "'$email'";
if ($conn->query($userExistsQuery) -> num_rows < 0) {
    die("Email of user no registered");
}
$user = $conn->query($userExistsQuery)->fetch_assoc();
$passwordVerify = password_verify($password, $user['password']);
if (!$passwordVerify){
    die("Password of user incorrect");
}

echo ("User logged with success");
$conn->close();
?>