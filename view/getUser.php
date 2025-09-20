<?php       
require("../src/db.php");

$userData = null;
$error = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $userQuery = "SELECT id, name, last_name, email FROM user WHERE id = $id";
    $result = $conn->query($userQuery);

    if ($result && $result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    } else {
        $error = "Usuario no encontrado";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Buscar Usuario</title>
  <link rel="stylesheet" href="./style/getUser.css"/> 
</head>
<body>
  <h2>Buscar Usuario</h2>

  <form method="get" action="">
    <label for="id">ID Usuario:</label>
    <input type="number" name="id" required>
    <input type="submit" value="Enviar" />
  </form>

  <?php if ($userData): ?>
    <h3>Datos del Usuario</h3>
    <!-- <table>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
      </tr>
      <tr>
        <td><?= $userData['name']?></td>
        <td><?= $userData['last_name']?></td>
        <td><?= $userData['email']?></td>
      </tr>
    </table> -->
    <p>Nombre: <?= $userData['name']?></p>
    <p>Apellido: <?= $userData['last_name']?></p>
    <p>Email: <?= $userData['email']?></p>

    <a href="updateUser.php?id=<?= $userData['id'] ?>">Editar</a>
    <a href="deleteUser.php?id=<?= $userData['id'] ?>">Eliminar</a> 
  <?php elseif ($error): ?>
    <p class="error"><?= $error?></p>
  <?php endif; ?>
</body>
</html>
