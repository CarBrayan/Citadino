<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Cliente</title>
    <style>body{font-family:Arial;padding:20px} input,button{padding:8px;margin:6px 0;width:100%;max-width:420px}</style>
</head>
<body>
    <h1>Agregar Cliente</h1>
    <form action="guardar.php" method="POST">
        <label>Nombre</label><br>
        <input type="text" name="nombre" required><br>

        <label>Cumpleaños</label><br>
        <input type="date" name="cumpleaños" required><br>

        <label>Dirección</label><br>
        <input type="text" name="direccion" required><br>

        <label>Correo</label><br>
        <input type="email" name="correo" required><br>

        <button type="submit">Guardar</button>
    </form>
    <p><a href="index.php">← Volver a la lista</a></p>
</body>
</html>
