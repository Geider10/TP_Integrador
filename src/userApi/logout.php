<?php
session_start();
session_unset(); // elimina variables de sesión
session_destroy(); // destruye la sesión
header("Location: ../../view/index.php");
exit();
?>
