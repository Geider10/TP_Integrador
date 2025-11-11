<?php
require_once("../../src/db.php");

$query = "
SELECT t.id, t.nota, t.fecha, t.hora, 
       d.nombre AS doctor, e.nombre AS especialidad
FROM turnos t
JOIN doctores d ON t.id_doctor = d.id
JOIN especialidades e ON d.id_especialidad = e.id
ORDER BY t.fecha, t.hora
";

$result = $conn->query($query);
$turnos = [];

while ($row = $result->fetch_assoc()) {
    $turnos[] = $row;
}

header("Content-Type: application/json");
echo json_encode($turnos);
