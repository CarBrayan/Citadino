<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../../config.php';

/**
 * Controlador para gestionar el registro de usuarios. En un MVC sencillo
 * se encargará de mostrar el formulario de registro y de procesar los datos
 * recibidos por POST.
 */
class UserController
{
    /**
     * Muestra el formulario de registro y procesa la creación de un
     * usuario cuando se envían los datos por POST. Si el registro se
     * completa correctamente, redirige a la página de éxito definida en
     * la constante BASE_URL.
     *
     * @return void
     */
    public function register(): void
    {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $email  = trim($_POST['email'] ?? '');
            $clave  = trim($_POST['clave'] ?? '');

            // Validación básica del formulario
            if ($nombre === '' || $email === '' || $clave === '') {
                $error = 'Todos los campos son obligatorios.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'El correo electrónico no es válido.';
            } else {
                $userModel = new User();

                // Comprobar si el correo ya está registrado
                if ($userModel->findByEmail($email)) {
                    $error = 'El correo ya está registrado.';
                } else {
                    if ($userModel->register($nombre, $email, $clave)) {
                        // Redireccionar a una página de éxito
                        header('Location: ' . BASE_URL . 'success.php?registro=1');
                        exit;
                    } else {
                        $error = 'Hubo un error al crear el usuario.';
                    }
                }
            }
        }
        // Incluimos la vista del registro. La variable $error estará
        // disponible en dicha vista para mostrar mensajes al usuario.
        include __DIR__ . '/../views/register.php';
    }
}