<?php
// Conexión a la base de datos (ajusta usuario/clave si es necesario)
$host = "localhost";
$user = "root";
$pass = "root1234";
$db   = "citadino";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
