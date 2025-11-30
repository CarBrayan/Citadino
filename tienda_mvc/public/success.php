<?php
// Página de éxito para operaciones como registro de usuario o mensaje
// genérico. El parámetro `registro=1` se usa para indicar que la
// operación exitosa corresponde al registro de un usuario.
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../app/views/header.php';

$mensaje = 'Operación realizada con éxito.';
if (isset($_GET['registro']) && $_GET['registro'] == '1') {
    $mensaje = 'Tu registro se ha completado correctamente. ¡Bienvenido!';
}
?>
<main class="container text-center">
    <h1 class="my-4 text-success">¡Éxito!</h1>
    <p><?php echo htmlspecialchars($mensaje); ?></p>
    <a href="<?php echo BASE_URL; ?>" class="btn btn-primary">Ir al inicio</a>
</main>
<?php require __DIR__ . '/../app/views/footer.php'; ?>