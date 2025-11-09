<?php
require_once("../../src/db.php");
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
  <main >
    <a  href="../doctorView/doctores.php">Volver</a>
    <h2>Solicitar Turno Médico</h2>
    <h1>Clínica Central</h1>
  </main>

  <form method="POST" action="../../src/turnApi/crear_turnos.php">
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

  <article>
    <h2>Antes de reservar el turno asegurate de completar todos los campos elegir una hora y fecha que tengas disponible</h2>
    <p>Nuestros doctores todos son especialisados, eligue el doctor de tu confianza</p>
  </article>
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
