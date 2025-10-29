<?php
include("../db.php");

if (!isset($_GET["id"])) die("ID no especificado.");
$id = intval($_GET["id"]);

$conn->query("DELETE FROM turnos WHERE id=$id");
header("Location: listar_turnos.php");
exit;
?>
