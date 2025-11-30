<?php
/*
 * Configuración principal de la aplicación.
 * Aquí se definen las constantes de conexión a la base de datos y la URL base
 * del sitio. Ajusta estos valores según tu entorno local (por ejemplo,
 * usuario root y contraseña vacía si usas XAMPP) y asegúrate de crear
 * previamente la base de datos `tienda` y la tabla `users` en phpMyAdmin.
 */

// Datos de conexión a la base de datos
define('DB_HOST', 'localhost');
define('DB_NAME', 'tienda');
define('DB_USER', 'root');
define('DB_PASS', '12345678');

// URL base de la aplicación para redireccionamientos (ajusta si usas un
// subdirectorio distinto). Debe terminar con una barra inclinada.
define('BASE_URL', 'http://localhost/tienda_mvc/public/');

// Iniciamos la sesión para poder utilizar la cesta de la compra en
// cualquier punto del flujo. Si la sesión ya está iniciada, la llamada
// no tiene efecto.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}