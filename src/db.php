<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "yoel1234";
$dbName = "mi_clinic";

//reglas
// FRONT: usar formulario para hacer las consultas CRUD
// Formulario type post = Crear, editar
// Fromulario type get (opcional) = enviar datos por query params.

// BACK: cambiar la query, recibir y enviar al front
// GET (pantalla con datos, en prioceso):Usar variable_session para recuperar los datos del usuario. En esta vista hay dos botones: editar y eliminar
// POST(registro ya integrado) : dos archivos html y la api en php.
// PUT(actualizar datos del usuario con formulario): dos archivos html y la api en php.
// Delete(eliminar cuenta): un boton, recupera el id y dispara a la apiDelete para ejecutar la consulta en DB.

// variable de sesion: luego de hacer el login almacenar el ID (paciente, doctor, admin) en variable de sesion, Luego usar esta variable para el resto de pantallas del usuario (Perfil)
// Llamar en todas los archivos 3 lineas (start_session, el arreglo[], start_sesion)
// sesion destroy: invocar funcion para cerrar sesion
// Usar la variable de session para validar el rol por funcionalidad.

// JS eventos: mensaje
//no hace falta subirlo el proyecto filezilla,
//comprimir el TP en un zip,
//exportar la BD en un archivo sql,

$conn = new mysqli ($dbHost, $dbUser, $dbPass, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


