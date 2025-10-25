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
  <title>Editar Usuario</title>
  <link rel="stylesheet" href="./style/updateUser.css"/> 

</head>
<body>
  <h2>Editar Usuario</h2>

  <?php if ($userData): ?>
    <form method="post" action="../src/userApi/update.php">
      <input type="hidden" name="id" value="<?= $userData['id'] ?>">

      <label>Nombre</label>
      <input type="text" name="name" required value="<?= $userData['name']?>">

      <label>Apellido</label>
      <input type="text" name="last_name" required value="<?= $userData['last_name']?>">

      <input type="submit" value="Enviar" />
    </form>
  <?php endif; ?>

</body>
</html>
