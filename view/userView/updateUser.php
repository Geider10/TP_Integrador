<?php       
session_start(); 
if (!isset($_SESSION["user_id"])) {
  header("Location: ../index.html");
  exit();
}

$id = $_SESSION["user_id"];
$name = $_SESSION["user_name"];
$lastName = $_SESSION["user_lastName"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Usuario</title>
  <link rel="stylesheet" href="../style/userStyle/updateUser.css"/> 
</head>
<body>
  <div class="modal-content"> 
    <h3>Editar Usuario</h3>
    <form method="POST" action="../../src/userApi/update.php">
        <input type="hidden" name="id" value="<?= $id?>">

        <label>Nombre</label>
        <input type="text" name="name" required value="<?= $name?>">

        <label>Apellido</label>
        <input type="text" name="last_name" required value="<?= $lastName?>">

        <div class="modal-actions">
            <button type="submit">Guardar Cambios</button>
            <a href="./profile.php">Cancelar</a>
        </div>
       
    </form>
  </div>

</body>
</html>