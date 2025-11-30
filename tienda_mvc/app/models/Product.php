<?php
require_once __DIR__ . '/../Database.php';

/**
 * Modelo Product para interactuar con la tabla `products`. Permite
 * obtener todos los productos disponibles y buscar uno por su ID.
 */
class Product
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
     * Devuelve todos los productos con stock mayor a cero ordenados por
     * nombre de manera ascendente.
     *
     * @return array
     */
    public function all(): array
    {
        $stmt = $this->db->query('SELECT * FROM products WHERE stock > 0 ORDER BY nombre ASC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Devuelve un producto por su ID o null si no existe.
     *
     * @param int $id
     * @return array|null
     */
    public function find(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM products WHERE id = :id LIMIT 1');
        $stmt->execute([':id' => $id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        return $product ?: null;
    }
}