<?php
include 'db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id > 0) {
    $conn->query("DELETE FROM clientes WHERE id = $id");
}
header("Location: index.php");
exit;
