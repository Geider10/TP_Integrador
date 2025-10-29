<?php
include 'db.php';

// Obtener turnos
$sql = "SELECT * FROM turnos";
$result = $conn->query($sql);

$turnos = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $turnos[] = $row;
    }
}

// Cargar la vista
include './view/listar_turnos_view.php';
