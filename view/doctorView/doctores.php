<?php
session_start();

// Verifica si hay sesión iniciada
$isLogedIn = isset($_SESSION['user_id']);
$userName = $isLogedIn ? $_SESSION['user_name'] : '';
$userRole = $isLogedIn ? $_SESSION['user_role'] : null;

require_once '../../src/db.php'; // conexión a la BD

// Obtener doctores con su especialidad (JOIN con tabla especialidades)
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
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
      <?php if ($userRole == 1): ?>
        <a href="../turnView/Listar_turnos.php">Gestionar</a>
      <?php endif; ?>
      <a href="../acerca.php">Acerca de Nosotros</a>
    </nav>
    <?php if (!$isLogedIn): ?>
      <div class="login-btn">
      <a href="userView/login.html">Ingresar</a>
    </div>
    <?php else: ?>
      <div class= "perfil">
      <a href="../userView/profile.php">Perfil <?= htmlspecialchars($userName) ?></a>
    </div>
    <?php endif; ?>
  </header>
  
    
    
  <?php if (!$isLogedIn): ?>
  <main class="container mt-5">
    <h2>⚠️ Para ver los doctores debes estar logueado.</h2>
  </main>
  <?php else: ?>

  <div id="formularios" class="container mt-3">

    <!-- Formulario Agregar -->
    <div class="formulario" id="form-agregar" style="display:none;">
      <h3>➕ Nuevo Doctor</h3>
      <form action="../../src/doctApi/createDoctor.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre del doctor" required><br>
        <input type="text" name="imagen" placeholder="URL de imagen" required><br>

        <!-- Selección de especialidad -->
        <select name="id_especialidad" required>
          <option value="">Seleccione una especialidad</option>
          <?php
        $esp = $conn->query("SELECT * FROM especialidades ORDER BY nombre ASC");
        while ($e = $esp->fetch_assoc()):
      ?>
          <option value="<?= $e['id'] ?>"><?= htmlspecialchars($e['nombre']) ?></option>
          <?php endwhile; ?>
        </select><br>

        <button type="submit" class="btn btn-success mt-2">Guardar</button>
      </form>
    </div>

    <!-- Formulario Borrar -->
    <div class="formulario" id="form-borrar" style="display:none;">
      <h3>🗑️ Borrar Doctor</h3>
      <form action="../../src/doctApi/deleteDoctor.php" method="POST">
        <input type="number" name="id" placeholder="ID del doctor" required><br>
        <button type="submit" class="btn btn-danger mt-2">Borrar</button>
      </form>
      
    </div>

    <!-- Formulario Editar -->
    <div class="formulario" id="form-editar" style="display:none;">
      <h3>✏️ Editar Doctor</h3>
      <form action="../../src/doctApi/updateDoctor.php" method="POST">
        <input type="number" name="id" placeholder="ID del doctor" required><br>
        <input type="text" name="nombre" placeholder="Nuevo nombre (opcional)"><br>
        <input type="text" name="imagen" placeholder="Nueva URL de imagen (opcional)"><br>

        <!-- Nuevo: cambiar especialidad -->
        <select name="id_especialidad">
          <option value="">(Sin cambios)</option>
          <?php
        $esp2 = $conn->query("SELECT * FROM especialidades ORDER BY nombre ASC");
        while ($e2 = $esp2->fetch_assoc()):
      ?>
          <option value="<?= $e2['id'] ?>"><?= htmlspecialchars($e2['nombre']) ?></option>
          <?php endwhile; ?>
        </select><br>

        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
      </form>
    </div>
  </div>

  <script>
    function mostrarFormulario(tipo) {
      ['form-agregar', 'form-borrar', 'form-editar'].forEach(id => {
        document.getElementById(id).style.display = 'none';
      });
      document.getElementById(`form-${tipo}`).style.display = 'block';
    }
  </script>

  <main class="container mt-4">
    <?php if ($userRole == 1): ?>
    <div class="btn">
      <button onclick="mostrarFormulario('agregar')" class="agregar">Nuevo Doctor</button>
    </div>
    <?php endif; ?>
    <h2 class="mb-3">👨‍⚕️ Lista de Doctores</h2>
    <div class="row">
      <?php foreach ($doctores as $doc): ?>
      <div class="col-md-4 mb-4">
        <div class="card shadow">
          <img src="<?= htmlspecialchars($doc['imagen']) ?>" class="card-img-top" alt="Doctor">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($doc['nombre']) ?></h5>
            <p class="card-text"><strong>Especialidad:</strong> <?= htmlspecialchars($doc['especialidad']) ?></p>
            <a href="../turnView/Solicitar_turnos.php" class="btn btn-outline-primary">Solicitar turno</a>
          </div>
          <?php if ($userRole == 1): ?>
            <div class="admin-buttons mt-2">
              <a href="update_Doctor.php?id=<?= $doc['id'] ?>" class="btn btn-sm btn-warning">✏️ Editar</a>
              <form action="../../src/doctApi/deleteDoctor.php" method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?= $doc['id'] ?>">
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este doctor?');">🗑️ Eliminar</button>
              </form>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </main>
  <?php endif; ?>

  <footer class="footer mt-5">
    <div class="footer-container">
      <div class="footer-info">
        <h3>Clínica Central</h3>
        <p>Av. San Martín 1234, Buenos Aires</p>
        <p>Tel: (011) 4567-8900</p>
        <p>Email: contacto@saludtotal.com</p>
      </div>

      <div class="footer-links">
        <h4>Enlaces útiles</h4>
        <ul>
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Solicitar Turno</a></li>
          <li><a href="#">Contacto</a></li>
          <li><a href="#">Nosotros</a></li>
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