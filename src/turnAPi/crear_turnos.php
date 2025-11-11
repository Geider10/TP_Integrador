<?php
require_once("../db.php");
session_start();

$isLogedIn = isset($_SESSION["user_id"]);
$userRole = $isLogedIn ? $_SESSION['user_role'] : null;

if (!$isLogedIn) {
    echo "<script>
        alert('Debe iniciar sesión para solicitar un turno.');
        window.history.back();
    </script>";
    exit;
}

if ($userRole == 1) {
    echo "<script>
        alert('No tiene permisos para solicitar un turno.');
        window.history.back();
    </script>";
    exit;
}

$id_user = $_SESSION["user_id"];
$id_especialidad = $_POST["id_especialidad"];
$id_doctor = $_POST["id_doctor"];
$nota = trim($_POST["nota"]);
$fecha = $_POST["fecha"] ;
$hora = $_POST["hora"];

if ($id_especialidad && $id_doctor && $nota && $fecha && $hora) {
    $stmt = $conn->prepare("INSERT INTO turnos (id_especialidad, id_doctor, nota, fecha, hora, id_user) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisssi", $id_especialidad, $id_doctor, $nota, $fecha, $hora, $id_user);

    if ($stmt->execute()) {
        echo "<script>
            alert('✅ Turno guardado correctamente. Ver turnos.');
            window.location.href='../../view/userView/profile.php';
        </script>";
    } else {
        echo "<script>
            alert('❌ Error al guardar el turno. Intente nuevamente.');
            window.history.back();
        </script>";
    }

    $stmt->close();
}
?>
