<?php
require_once("../db.php");

// Función que obtiene un doctor por su ID
function getDoctorById($id) {
    global $conn;

    // Evitar inyección SQL
    $id = intval($id);

    $query = "SELECT * FROM doctor WHERE id = $id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}
?>
