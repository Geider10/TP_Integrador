<?php
require_once '../../src/db.php';
session_start();

$isLogedIn = isset($_SESSION['user_id']);
$userName = $isLogedIn ? $_SESSION['user_name'] : '';
$userRole = $isLogedIn ? $_SESSION['user_role'] : null;

$query = $conn->query("
  SELECT d.id, d.nombre, d.imagen, e.nombre AS especialidad
  FROM doctores d
  INNER JOIN especialidades e ON d.id_especialidad = e.id
  ORDER BY d.id DESC
");
$doctores = $query->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/doctorStyle/doctores.css">
  <title>Gestión de Doctores</title>
</head>

<body>
  <header class="header">
    <div class="logo">
      <h1>Clínica Central</h1>        
    </div>

    <nav class="nav-links">
      <a href="../index.php">Inicio</a>
      <a href="../turnView/Solicitar_turnos.php">Turnos</a>
      <a href="#">Doctores</a>
      <a href="../acerca.php">Acerca de Nosotros</a>
    </nav>
    <?php if (!$isLogedIn): ?>
      <div class="login-btn">
      <a href="../userView/login.html">Ingresar</a>
    </div>
    <?php else: ?>
      <div class= "perfil">
      <a href="../userView/profile.php">Perfil <?= htmlspecialchars($userName) ?></a>
    </div>
    <?php endif; ?>
  </header>

 <main class="main-doctores">
    <?php if ($userRole == 1): ?>
    <div class="add-doctor-container">
        <a href="crear_doctor.php" class="add-doctor-btn">Crear Doctor</a>
    </div>
    <?php endif; ?>
    <h2>Lista de Doctores</h2>
    <div class="row">
        <?php foreach ($doctores as $doc): ?>
        <div class="card">
            <img src="<?= htmlspecialchars($doc['imagen']) ?>" alt="Doctor" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($doc['nombre']) ?></h5>
                <p class="card-text">
                    <strong>Especialidad:</strong> <?= htmlspecialchars($doc['especialidad']) ?>
                </p>
                <?php if ($userRole == 2): ?>
                    <a href="../turnView/Solicitar_turnos.php" class="btn-outline-primary">
                        Solicitar turno
                    </a>
                <?php endif; ?>
            </div>
            <?php if ($userRole == 1): ?>
            <div class="admin-buttons">
                <a href="update_Doctor.php?id=<?= $doc['id'] ?>" class="admin-btn edit-btn">
                    Editar
                </a>
                <form action="../../src/doctApi/deleteDoctor.php" method="POST">
                    <input type="hidden" name="id" value="<?= $doc['id'] ?>">
                    <button type="submit" class="admin-btn delete-btn"
                        onclick="return confirm('¿Seguro que deseas eliminar este doctor?');">
                        Eliminar
                    </button>
                </form>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</main>


  <footer class="footer mt-5">
    <div class="footer-container">
      <div class="footer-info">
         <h3>Clínica Central</h3>
        <p>📍 Dirección: Pichincha 1890, CABA</p>
        <p>📞 Teléfono: 11 2233-4455</p></p>
        <p>Email: contacto@clinicacentral.com</p>
      </div>

      <div class="footer-links">
        <h4>Enlaces útiles</h4>
        <ul>
          <li><a href="../index.php">Inicio</a></li>
          <li><a href="../turnView/Solicitar_turnos.php">Turnos</a></li>
          <li><a href="../doctorView/doctores.php">Doctores</a></li>
          <li><a href="../acerca.php">Acerca de Nostros</a></li>
        </ul>
      </div>

      <div class="footer-social">
        <h4>Seguinos</h4>
        <a href="#"><img src="../img/facebook.svg" alt="Facebook"></a>
        <a href="#"><img src="../img/instagram.svg" alt="Instagram"></a>
        <a href="#"><img src="../img/twitterx.svg" alt="Twitter"></a>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2025 Hospital Central — Todos los derechos reservados</p>
    </div>
  </footer>
</body>

</html>
