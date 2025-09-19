<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "yoel1234";
$dbName = "mi_clinic";

//reglas
// FRONT: usar formulario para hacer las consultas CRUD
// Formulario type post = Crear, editar, eliminar
// Fromulario type get = enviar datos por query params. Como recupero los datos???

// BACK: cambiar la query, recibir y enviar al front
// GET (pantalla con datos, en prioceso): la profe usa un archivo.php para hacer la consulta y crear una tabla con los datos (Lectura y Muestra). En esta vista hay dos botones: editar y eliminar
// POST(registro ya integrado) : dos archivos html y la api en php. Como volver a la view login.html??
// PUT(actualizar datos del usuario con formulario): dos archivos html y la api en php. Como volver a la view usuario.html??
// Delete(eliminar cuenta): dos archivos html y la api en php??. Como volver a la view index.html??

$conn = new mysqli ($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>