<?php
/**
 * Clase Database encargada de gestionar la conexión a MySQL mediante PDO.
 * Implementa el patrón singleton para que exista una única instancia de
 * conexión en toda la aplicación. De esta forma evitamos abrir múltiples
 * conexiones innecesarias.
 */
class Database
{
    /**
     * Instancia única de Database
     * @var Database|null
     */
    private static $instance = null;

    /**
     * Instancia de PDO
     * @var \PDO
     */
    private $conn;

    /**
     * Constructor privado para impedir la creación directa de nuevos
     * objetos; inicializa la conexión PDO usando las constantes de
     * configuración definidas en config.php.
     */
    private function __construct()
    {
        // Recuperamos las constantes definidas en config.php
        $host = DB_HOST;
        $dbname = DB_NAME;
        $user = DB_USER;
        $pass = DB_PASS;
        $charset = 'utf8mb4';

        $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";

        try {
            $this->conn = new PDO($dsn, $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Si la conexión falla lanzamos una excepción con un mensaje legible
            die('Error de conexión a la base de datos: ' . $e->getMessage());
        }
    }

    /**
     * Devuelve la instancia única de Database. Si no existe se crea.
     * @return Database
     */
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Devuelve la conexión PDO para interactuar con MySQL.
     * @return \PDO
     */
    public function getConnection(): PDO
    {
        return $this->conn;
    }
}