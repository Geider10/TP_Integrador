<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Turnos</title>
  <link rel="stylesheet" href="../style/turnStyle/turnos_lista.css">
</head>
<body>
  <a href="../index.php">  Home</a>
  <h2>Turnos Registrados</h2>

  <table border="1">
    <thead>
      <tr>
        <th>ID</th>
        <th>Paciente</th>
        <th>Doctor</th>
        <th>Especialidad</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="tablaTurnos"></tbody>
  </table>

  <script>
    fetch("../../src/turnApi/listar_turnos.php")
      .then(r => r.json())
      .then(data => {
        const tabla = document.getElementById("tablaTurnos");
        tabla.innerHTML = data.map(t => `
          <tr>
            <td>${t.id}</td>
            <td>${t.paciente}</td>
            <td>${t.doctor}</td>
            <td>${t.especialidad}</td>
            <td>${t.fecha}</td>
            <td>${t.hora}</td>
            <td>
              <a href="Editar_turnos.php?id=${t.id}">Editar</a> |
              <a href="../../src/turnApi/eliminar_turnos.php?id=${t.id}" onclick="return confirm('¿Seguro que deseas eliminar este turno?')">Eliminar</a>
            </td>
          </tr>
        `).join("");
      });
  </script>
</body>
</html>
