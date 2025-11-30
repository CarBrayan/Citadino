<?php
include 'db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$q = $conn->query("SELECT * FROM clientes WHERE id = $id");
$r = $q->fetch_assoc();
if (!$r) {
    echo "Cliente no encontrado.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <style>body{font-family:Arial;padding:20px} input,button{padding:8px;margin:6px 0;width:100%;max-width:420px}</style>
</head>
<body>
    <h1>Editar Cliente #<?= htmlspecialchars($r['id']) ?></h1>
    <form action="actualizar.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($r['id']) ?>">

        <label>Nombre</label><br>
        <input type="text" name="nombre" value="<?= htmlspecialchars($r['nombre']) ?>" required><br>

        <label>Cumpleaños</label><br>
        <input type="date" name="cumpleaños" value="<?= htmlspecialchars($r['cumpleaños']) ?>" required><br>

        <label>Dirección</label><br>
        <input type="text" name="direccion" value="<?= htmlspecialchars($r['direccion']) ?>" required><br>

        <label>Correo</label><br>
        <input type="email" name="correo" value="<?= htmlspecialchars($r['correo']) ?>" required><br>

        <button type="submit">Actualizar</button>
    </form>
    <p><a href="index.php">← Volver a la lista</a></p>
</body>
</html>
