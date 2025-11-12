<?php
require_once("../../src/db.php");

$id = $_GET['id'];
$turno = $conn->query("SELECT * FROM turnos WHERE id = $id")->fetch_assoc();
$doctores = $conn->query("SELECT * FROM doctores");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Turno</title>
  <link rel="stylesheet" href="../style/turnStyle/Editar_turnos.css">
</head>
<body>
  <main>
    <h2>Editar Turno</h2>

    <form method="POST" action="../../src/turnApi/editar_turnos.php">
      <input type="hidden" name="id" value="<?= $turno['id'] ?>">

      <label for="id_doctor">Doctor:</label>
      <select id="id_doctor" name="id_doctor" required>
        <?php while($d = $doctores->fetch_assoc()): ?>
          <option value="<?= $d['id'] ?>" <?= $d['id'] == $turno['id_doctor'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($d['nombre']) ?>
          </option>
        <?php endwhile; ?>
      </select>

      <label for="fecha">Fecha:</label>
      <input type="date" id="fecha" name="fecha" value="<?= $turno['fecha'] ?>" required>

      <label for="hora">Hora:</label>
      <input type="time" id="hora" name="hora" value="<?= $turno['hora'] ?>" required>

      <button type="submit">Guardar cambios</button>
    </form>

    <a href="../../view/userView/profile.php" class="volver">← Volver</a>
  </main>
</body>
</html>
