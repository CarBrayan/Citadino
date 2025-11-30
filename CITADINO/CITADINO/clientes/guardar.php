<?php
include 'db.php';

// Sanitizar entradas básicas
$nombre = $conn->real_escape_string(trim($_POST['nombre'] ?? ''));
$cumple  = $conn->real_escape_string(trim($_POST['cumpleaños'] ?? ''));
$direccion = $conn->real_escape_string(trim($_POST['direccion'] ?? ''));
$correo = $conn->real_escape_string(trim($_POST['correo'] ?? ''));

// Insert
$sql = "INSERT INTO clientes (nombre, cumpleaños, direccion, correo) VALUES ('$nombre', '$cumple', '$direccion', '$correo')";
$conn->query($sql);

// Redirigir al listado
header("Location: index.php");
exit;
