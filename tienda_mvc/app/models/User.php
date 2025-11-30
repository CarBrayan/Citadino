<?php
require_once __DIR__ . '/../Database.php';

/**
 * Modelo User encargado de interactuar con la tabla `users` de la base de datos.
 * Cada método representa una operación concreta sobre los datos de usuario
 * (crear nuevos registros, buscar por correo, etc.).
 */
class User
{
    /**
     * Conexión PDO
     * @var \PDO
     */
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Registra un nuevo usuario almacenando la contraseña encriptada con
     * password_hash (utiliza el algoritmo por defecto – actualmente
     * BCRYPT). Devuelve true si la operación tuvo éxito.
     *
     * @param string $nombre
     * @param string $email
     * @param string $clave
     * @return bool
     */
    public function register(string $nombre, string $email, string $clave): bool
    {
        $hash = password_hash($clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO users (nombre, email, clave) VALUES (:nombre, :email, :clave)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nombre' => $nombre,
            ':email'  => $email,
            ':clave'  => $hash
        ]);
    }

    /**
     * Busca un usuario por su dirección de correo electrónico y devuelve un
     * array asociativo con los datos si lo encuentra o false en caso contrario.
     *
     * @param string $email
     * @return array|false
     */
    public function findByEmail(string $email)
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $stmt->execute([':email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}