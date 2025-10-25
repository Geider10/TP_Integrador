<?php       
require("../../src/db.php");

$userData = null;
$id = $_GET['id'];

$userQuery = "SELECT id, name, last_name FROM user WHERE id = $id";
$result = $conn->query($userQuery);

if ($result && $result->num_rows > 0) {
    $userData = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Eliminar Usuario</title>
  <link rel="stylesheet" href="./style/deleteUser.css"/> 
</head>
<body>
  <h2>Eliminar Usuario</h2>
  <p class="warning">¿Seguro que quieres eliminar este usuario?</p>
  
  <form method="post" action="../src/userApi/delete.php">
    <input type="hidden" name="id" value="<?=$userData['id']?>">

    <input type="submit" value="Enviar"/>
    <a href="getUser.php?id=<?=$userData['id']?>"><button type="button">Cancelar</button></a>
  </form>
</body>
</html>
