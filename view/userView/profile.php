<?php      
require_once("../../src/db.php");
session_start(); 
if (!isset($_SESSION["user_id"])) {
  header("Location: ../index.html");
  exit();
}

$id = $_SESSION["user_id"];
$name = $_SESSION["user_name"];
$lastName = $_SESSION["user_lastName"];
$email = $_SESSION["user_email"];
$userRole = $_SESSION["user_role"];

$turnosUser = $conn->query("SELECT t.id ,e.nombre AS especialidad, d.nombre AS doctor, t.fecha, t.hora 
                                  FROM turnos t
                                  JOIN especialidades e ON t.id_especialidad = e.id
                                  JOIN doctores d ON t.id_doctor = d.id
                                  WHERE t.id_user = $id
                                  ORDER BY t.fecha, t.hora");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Perfil de Usuario</title>
  <link rel="stylesheet" href="../style/userStyle/profile.css"/> 
</head>
<body>
  <header class="header">
  <div>
      <a href="../index.php">
          <h2><- Clínica Central</h2> 
      </a>    
  </div>
  </header>

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

  <?php if ($userRole == 2): ?>
    <h2>Turnos Registrados</h2>
    <table border="1">
      <thead>
        <tr>
          <th>Especialidad</th>
          <th>Doctor</th>
          <th>Fecha</th>
          <th>Hora</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody id="tablaTurnos">
        <?php while ($turno = $turnosUser->fetch_assoc()): ?>
          <tr>
            <td><?= htmlspecialchars($turno['especialidad']) ?></td>
            <td><?= htmlspecialchars($turno['doctor']) ?></td>
            <td><?= htmlspecialchars($turno['fecha']) ?></td>
            <td><?= htmlspecialchars($turno['hora']) ?></td>
            <td>
                <button class="btn-edit" 
                  data-id="<?= $row['id'] ?>" 
                  data-name="<?= $row['nombre'] ?>">
                  Editar
                </button>
              <a class="btn-delete" href="../../src/turnApi/eliminar_turnos.php?id=<?= $turno['id'] ?>">Cancelar</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  <?php endif; ?>

</body>
</html>
