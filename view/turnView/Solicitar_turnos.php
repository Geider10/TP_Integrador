<?php
require_once("../../src/db.php");
session_start();

$isLogedIn = isset($_SESSION["user_id"]);
$userRole = $isLogedIn ? $_SESSION['user_role'] : null;
$nameUser = $isLogedIn ? $_SESSION["user_name"] : null;

$especialidades = $conn->query("SELECT * FROM especialidades ORDER BY nombre");
$doctores = $conn->query("SELECT * FROM doctores ORDER BY nombre");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Solicitar Turno</title>
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
      <a href="../acerca.php">Acerca de Nosotros</a>
    </nav>
    <?php if (!$isLogedIn): ?>
      <div class="login-btn">
        <a href="../userView/login.html">Ingresar</a>
      </div>
    <?php else: ?>
      <div class="perfil"> 
        <a href="../userView/profile.php">Perfil <?= htmlspecialchars($nameUser) ?></a>
      </div>
    <?php endif; ?>
  </header>

  <main class="main">
    <div class="card">
      <h1>Solicitar turno</h1>

      <form method="POST" action="../../src/turnApi/crear_turnos.php">
        <label for="especialidad">Especialidad*</label>
        <select id="especialidad" name="id_especialidad" required>
          <option value="">Seleccione una especialidad</option>
          <?php while ($e = $especialidades->fetch_assoc()): ?>
            <option value="<?= $e['id'] ?>"><?= htmlspecialchars($e['nombre']) ?></option>
          <?php endwhile; ?>
        </select>

        <label for="doctor">Doctor*</label>
        <select id="doctor" name="id_doctor" required>
          <option value="">Seleccione una especialidad primero</option>
        </select>

        <label for="fecha">Fecha*</label>
        <input type="date" name="fecha" id="fecha" required>

        <label for="hora">Hora*</label>
        <input type="time" name="hora" id="hora" required>

        <label for="nota">Nota</label>
        <textarea name="nota" id="nota"></textarea>

        <button type="submit">Guardar Turno</button>
      </form>
    </div>
  </main>

  <script>
    const doctores = <?php
      $doctorList = [];
      while ($d = $doctores->fetch_assoc()) {
          $doctorList[] = [
              'id' => $d['id'],
              'nombre' => $d['nombre'],
              'id_especialidad' => $d['id_especialidad']
          ];
      }
      echo json_encode($doctorList);
    ?>;

    const selectEspecialidad = document.getElementById("especialidad");
    const selectDoctor = document.getElementById("doctor");

    selectEspecialidad.addEventListener("change", function () {
      const idEsp = this.value;
      selectDoctor.innerHTML = "<option value=''>Seleccione un doctor</option>";
      if (!idEsp) {
        selectDoctor.innerHTML = "<option value=''>Seleccione una especialidad primero</option>";
        return;
      }

      // Filtrar doctores
      const filtrados = doctores.filter(d => d.id_especialidad == idEsp);

      if (filtrados.length > 0) {
        filtrados.forEach(doc => {
          const option = document.createElement("option");
          option.value = doc.id;
          option.textContent = doc.nombre;
          selectDoctor.appendChild(option);
        });
      } else {
        selectDoctor.innerHTML = "<option value=''>No hay doctores disponibles</option>";
      }
    });
  </script>
</body>
</html>
