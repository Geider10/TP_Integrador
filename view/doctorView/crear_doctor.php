<?php
require_once("../../src/db.php"); // conexión a la base de datos
$especialidades = $conn->query("SELECT * FROM especialidades ORDER BY nombre ASC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Nuevo Doctor</title>
  <link rel="stylesheet" href="../style/doctorStyle/crear_doctor.css"></head>
<body>


  <main class="main-crear-doctor">
    <h2>Registrar Nuevo Doctor</h2>
    <form action="../../src/doctApi/createDoctor.php" method="POST" class="form-doctor">

      <label>Nombre del Doctor</label>
      <input type="text" name="nombre" placeholder="Ej: Dr. Juan Pérez" required>

      <label>Especialidad</label>
      <select name="id_especialidad" required>
        <option value="">Seleccione una especialidad</option>
        <?php while($esp = $especialidades->fetch_assoc()): ?>
          <option value="<?= $esp['id'] ?>"><?= htmlspecialchars($esp['nombre']) ?></option>
        <?php endwhile; ?>
      </select>

      <label>URL de Imagen</label>
      <input type="text" name="imagen" placeholder="https://...">

      <button type="submit" class="btn-crear">Guardar Doctor</button>
      <a href="listar_doctores.php" class="btn-volver">⬅ Volver</a>
    </form>
  </main>

</body>
</html>
