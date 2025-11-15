<?php
require_once("../../src/db.php");

$id = $_GET['id'];
$doctor = $conn->query("SELECT * FROM doctores WHERE id = $id")->fetch_assoc();
$especialidades = $conn->query("SELECT * FROM especialidades ORDER BY nombre ASC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../style/doctorStyle/editar_doctor.css">
  <title>Editar Doctor</title>
</head>
<body>
  <div class="editar-container">
    <h2>Editar Doctor</h2>
    <form method="POST" action="../../src/doctApi/updateDoctor.php">
      <input type="hidden" name="id" value="<?= $doctor['id'] ?>">

      <label>Nombre:</label>
      <input type="text" name="nombre" value="<?= htmlspecialchars($doctor['nombre']) ?>" required>

      <label>Imagen (URL):</label>
      <input type="text" name="imagen" value="<?= htmlspecialchars($doctor['imagen']) ?>" required>

      <label>Especialidad:</label>
      <select name="id_especialidad" required>
        <?php while($e = $especialidades->fetch_assoc()): ?>
          <option value="<?= $e['id'] ?>" <?= $e['id'] == $doctor['id_especialidad'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($e['nombre']) ?>
          </option>
        <?php endwhile; ?>
      </select>

      <button type="submit" class="btn-guardar">Guardar cambios</button>
    </form>

    <a href="doctores.php" class="volver">⬅ Volver</a>
  </div>
</body>
</html>
