<?php
require_once("../../src/db.php");
session_start();
$isLogedIn = true;
if (!isset($_SESSION["user_id"])) {
    $isLogedIn = false;
}
$userRole = $isLogedIn ? $_SESSION['user_role'] : null;
$nameUser = $isLogedIn ? $_SESSION["user_name"] : null;

$especialidades = $conn->query("SELECT * FROM especialidades ORDER BY nombre");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Solicitar Turno Médico</title>
  <link rel="stylesheet" href="../style/turnStyle/Solicitar_turnos.css">
</head>
<body>
  <header>
    <div class="logo">
      <h1>Clínica Central</h1>        
    </div>
    <nav class="nav-links">
      <a href="../index.php">Inicio</a>
      <a href="../turnView/Solicitar_turnos.php">Turnos</a>
      <a href="../doctorView/doctores.php">Doctores</a>
      <?php if ($userRole == 1): ?>
        <a href="turnView/Listar_turnos.php">Gestionar</a>
      <?php endif; ?>
      <a href="../acerca.php">Acerca de Nosotros</a>
    </nav>
    <?php if (!$isLogedIn): ?>
      <div class="login-btn">
      <a href="userView/login.html">Ingresar</a>
    </div>
    <?php else: ?>
      <div class="perfil"> 
        <a  href="../userView/profile.php">Perfil <?= $nameUser?></a>
      </div>
    <?php endif; ?>
  </header>
  <main class="main">
    <div class="card">
      <h1>Solicitar turno</h1>
         <form method="POST" action="../../src/turnAPi/crear_turnos.php">
          <label for="especialidad">Especialidad:</label>
          <select id="especialidad" name="id_especialidad" required>
            <option value="">Seleccione una especialidad</option>
            <?php while ($e = $especialidades->fetch_assoc()) : ?>
              <option value="<?= $e['id'] ?>"><?= htmlspecialchars($e['nombre']) ?></option>
            <?php endwhile; ?>
          </select>

          <label for="doctor">Doctor:</label>
          <select id="doctor" name="id_doctor" required>
            <option value="">Seleccione una especialidad primero</option>
          </select>

          <label for="paciente">Paciente:</label>
          <input type="text" name="paciente" id="paciente" required>

          <label for="fecha">Fecha:</label>
          <input type="date" name="fecha" id="fecha" required>

          <label for="hora">Hora:</label>
          <input type="time" name="hora" id="hora" required>

          <button type="submit">Guardar Turno</button>
        </form>
    </div>
  </main>
 

  <script>
  document.getElementById("especialidad").addEventListener("change", function() {
    const idEsp = this.value;
    const selectDoc = document.getElementById("doctor");

    if (idEsp) {
      fetch(`../../src/turnApi/get_doctores_por_especialidad.php?id_especialidad=${idEsp}`)
        .then(res => res.json())
        .then(doctores => {
          selectDoc.innerHTML = "<option value=''>Seleccione un doctor</option>";
          doctores.forEach(doc => {
            selectDoc.innerHTML += `<option value="${doc.id}">${doc.nombre}</option>`;
          });
        })
        .catch(err => {
          console.error("Error al cargar doctores:", err);
          selectDoc.innerHTML = "<option value=''>Error al cargar doctores</option>";
        });
    } else {
      selectDoc.innerHTML = "<option value=''>Seleccione una especialidad primero</option>";
    }
  });
  </script>
</body>
</html>
