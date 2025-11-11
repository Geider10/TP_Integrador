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
  <h2>Perfil</h2>
  <div class="profile-container"> 
    <img src="../img/usuario.jpg" alt="User Avatar" width="150" height="150">
    <p>Nombre: <?= $name ?></p>
    <p>Apellido: <?= $lastName?></p>
    <p>Email: <?= $email?></p>
    <div class="profile-actions">
      <a href="../../src/userApi/logout.php" class="btn-logout">Cerrar sesión</a>
      <a href="./updateUser.php" class="btn-edit">Editar datos</a>
      <a href="../../src/userApi/delete.php?id=<?= $id?>"class="btn-delete">Eliminar cuenta</a>
    </div>
  </div>

  <h2>Turnos Registrados</h2>
  <table border="1">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nota</th>
        <th>Doctor</th>
        <th>Especialidad</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="tablaTurnos"></tbody>
  </table>

  <script>
    fetch("../../src/turnApi/listar_turnos.php")
      .then(r => r.json())
      .then(data => {
        const tabla = document.getElementById("tablaTurnos");
        tabla.innerHTML = data.map(t => `
          <tr>
            <td>${t.id}</td>
            <td>${t.nota}</td>
            <td>${t.doctor}</td>
            <td>${t.especialidad}</td>
            <td>${t.fecha}</td>
            <td>${t.hora}</td>
            <td>
              <a href="Editar_turnos.php?id=${t.id}">Editar</a> |
              <a href="../../src/turnApi/eliminar_turnos.php?id=${t.id}" onclick="return confirm('¿Seguro que deseas eliminar este turno?')">Eliminar</a>
            </td>
          </tr>
        `).join("");
      });
  </script>

</body>
</html>
