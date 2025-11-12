<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "hector2303";
$dbName = "mi_clinic";

$conn = new mysqli ($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
}
// JS eventos: mensaje
//no hace falta subirlo el proyecto filezilla,
//comprimir el TP en un zip,
//exportar la BD en un archivo sql,
//indicar la ruta


