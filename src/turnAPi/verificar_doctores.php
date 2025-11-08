<?php
require_once("../db.php");

echo "<h2>🔍 Verificador de Doctores por Especialidad</h2>";

$query = $conn->query("
    SELECT d.id AS id_doctor, d.nombre AS doctor, e.nombre AS especialidad
    FROM doctores d
    LEFT JOIN especialidades e ON d.id_especialidad = e.id
    ORDER BY e.nombre, d.nombre
");

if ($query->num_rows > 0) {
    echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse;'>";
    echo "<tr style='background-color:#d4f4d7;'>
            <th>ID Doctor</th>
            <th>Nombre</th>
            <th>Especialidad</th>
          </tr>";

    while ($row = $query->fetch_assoc()) {
        $esp = $row['especialidad'] ? $row['especialidad'] : "<span style='color:red;'>❌ Sin especialidad</span>";
        echo "<tr>
                <td>{$row['id_doctor']}</td>
                <td>{$row['doctor']}</td>
                <td>{$esp}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No hay doctores registrados.</p>";
}

$conn->close();
?>
