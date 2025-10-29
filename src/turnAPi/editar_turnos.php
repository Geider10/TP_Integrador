<?php
include("../db.php");

if (!isset($_GET["id"])) die("ID no especificado.");
$id = intval($_GET["id"]);

$turno = $conn->query("SELECT * FROM turnos WHERE id=$id")->fetch_assoc();
$especialidades = $conn->query("SELECT * FROM especialidades ORDER BY nombre");
$doctores = $conn->query("SELECT * FROM doctores ORDER BY nombre");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id_especialidad = $_POST["especialidad"];
    $id_doctor = $_POST["doctor"];
    $paciente = $_POST["paciente"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

    $sql = "UPDATE turnos SET id_doctor='$id_doctor', id_especialidad='$id_especialidad',
            paciente='$paciente', fecha='$fecha', hora='$hora' WHERE id=$id";

    if ($conn->query($sql)) {
        header("Location: listar_turnos.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Editar Turno</title>
<link rel="stylesheet" href="style/Solicitar_turnos.css">
</head>

<body>
<h2>Editar Turno</h2>
<form method="POST">
<label>Especialidad:</label>
<select name="especialidad">
<?php while($e = $especialidades->fetch_assoc()): ?>
  <option value="<?= $e['id'] ?>" <?= $turno['id_especialidad']==$e['id']?'selected':'' ?>>
    <?= htmlspecialchars($e['nombre']) ?>
  </option>
<?php endwhile; ?>
</select>

<label>Doctor:</label>
<select name="doctor">
<?php while($d = $doctores->fetch_assoc()): ?>
  <option value="<?= $d['id'] ?>" <?= $turno['id_doctor']==$d['id']?'selected':'' ?>>
    <?= htmlspecialchars($d['nombre']) ?>
  </option>
<?php endwhile; ?>
</select>

<label>Paciente:</label>
<input type="text" name="paciente" value="<?= htmlspecialchars($turno['paciente']) ?>">

<label>Fecha:</label>
<input type="date" name="fecha" value="<?= $turno['fecha'] ?>">

<label>Hora:</label>
<input type="time" name="hora" value="<?= $turno['hora'] ?>">

<button type="submit">Guardar cambios</button>
</form>
</body>
</html>
