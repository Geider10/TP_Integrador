<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "hector2303";
$dbName = "mi_clinic";

// FRONT: usar formulario para hacer las consultas CRUD
// Form type post = Crear, editar, eliminar
// From type get = enviar datos por query params. Como recupero los datos???

// BACK: cambiar la query, recibir y enviar al front
// GET: la profe usa un archivo.php para hacer la consulta y crear una tabla con los datos (Lectura y se muestra). Se puede hacer en dos archivos
// POST: dos archivos html y la api en php. Como volver a la view usuario.html o .php??
// PUT: dos archivos html y la api en php. Como volver a la view usuario.html o .php??
// Delete: dos archivos html y la api en php. Como volver a la view usuario.html o .php??

$conn = new mysqli ($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>