<?php
include 'db.php';

$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$nombre = $conn->real_escape_string(trim($_POST['nombre'] ?? ''));
$cumple  = $conn->real_escape_string(trim($_POST['cumpleaños'] ?? ''));
$direccion = $conn->real_escape_string(trim($_POST['direccion'] ?? ''));
$correo = $conn->real_escape_string(trim($_POST['correo'] ?? ''));

// Update
$sql = "UPDATE clientes SET nombre='$nombre', cumpleaños='$cumple', direccion='$direccion', correo='$correo' WHERE id=$id";
$conn->query($sql);

// Redirigir
header("Location: index.php");
exit;
