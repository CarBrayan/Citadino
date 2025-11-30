<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes - Citadino</title>
    <style>
        body{font-family:Arial,Helvetica,sans-serif;padding:20px;}
        table{border-collapse:collapse;width:100%}
        th,td{border:1px solid #ddd;padding:8px;text-align:left}
        th{background:#f4f4f4}
        a.btn{display:inline-block;padding:8px 12px;border-radius:6px;text-decoration:none;background:#000;color:#fff}
    </style>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <p><a class="btn" href="crear.php">➕ Nuevo Cliente</a></p>

    <table>
        <tr><th>ID</th><th>Nombre</th><th>Cumpleaños</th><th>Dirección</th><th>Correo</th><th>Acciones</th></tr>
        <?php
        $q = $conn->query("SELECT * FROM clientes ORDER BY id DESC");
        while ($r = $q->fetch_assoc()):
        ?>
            <tr>
                <td><?= htmlspecialchars($r['id']) ?></td>
                <td><?= htmlspecialchars($r['nombre']) ?></td>
                <td><?= htmlspecialchars($r['cumpleaños']) ?></td>
                <td><?= htmlspecialchars($r['direccion']) ?></td>
                <td><?= htmlspecialchars($r['correo']) ?></td>
                <td>
                    <a href="editar.php?id=<?= $r['id'] ?>">Editar</a> |
                    <a href="eliminar.php?id=<?= $r['id'] ?>" onclick="return confirm('Eliminar cliente #<?= $r['id'] ?>?')">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
