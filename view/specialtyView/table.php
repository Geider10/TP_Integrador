<?php      
session_start(); 
require("../../src/db.php");

$getSpecialtyQuery = "SELECT * FROM specialty";
$specialtyList = $conn->query($getSpecialtyQuery);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/specialtyStyle/table.css">
    <title>Especialidades</title>
</head>
<body>
    <div class="table-container"> 
        <h2>Listado de Especialidades</h2>
        <button id="btnAdd" class="btn-primary">Agregar</button>
    </div>
    <?php if ($specialtyList && $specialtyList->num_rows > 0): ?>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $specialtyList->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['name']?></td>
                            <td>
                                <button class="btn-edit" 
                                    data-id="<?= $row['id'] ?>" 
                                    data-name="<?= $row['name'] ?>">
                                    Editar
                                </button>
                                <a class="btn-delete" href="../../src/specialtyApi/delete.php?id=<?= $row['id'] ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table> 
        </div>
    <?php else: ?>
        <div class="table-container">
            <p>No hay especialidades registradas.</p>
        </div>
    <?php endif; ?>

    <!-- Modal -->
    <div id="modal" class="modal hidden">
        <div class="modal-content">
            <h3>Editar Especialidad</h3>
            <form id="formEdit" method="POST" action="../../src/specialtyApi/add.php">
                <input type="hidden" name="id" id="inputId">
                <div> 
                   <label>Nombre</label>
                   <input type="text" name="name" id="inputName" required>
                </div>
                <div class="modal-actions">
                    <button type="submit" class="btn-primary">Guardar Cambios</button>
                    <button type="button" id="btnClose" class="btn-secondary">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="./specialtyModal.js"></script>
</body>
</html>
