<?php      
session_start(); 
if (!isset($_SESSION["user_id"])) {
  header("Location: ../index.html");
  exit();
}

$id = $_SESSION["user_id"];
$name = $_SESSION["user_name"];
$lastName = $_SESSION["user_lastName"];
$email = $_SESSION["user_email"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Perfil de Usuario</title>
  <link rel="stylesheet" href="../style/userStyle/profile.css"/> 
</head>
<body>

  <div class="profile-container"> 
    <h2>Perfil</h2>
    <!-- <img src="../../public/images/user_avatar.png" alt="User Avatar" width="150" height="150">-->
    <p>Nombre: <?= $name ?></p>
    <p>Apellido: <?= $lastName?></p>
    <p>Email: <?= $email?></p>

    <a href="./updateUser.php">Editar datos</a>
    <a href="../../src/userApi/delete.php?id=<?= $id?>">Eliminar cuenta</a>
    <a href="../../src/userApi/logout.php">Cerrar sesión</a>
  </div>

</body>
</html>
