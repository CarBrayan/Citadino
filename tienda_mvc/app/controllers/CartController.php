<?php
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../../config.php';

/**
 * Controlador de la cesta de la compra. Gestiona las operaciones de
 * añadir, eliminar, visualizar y finalizar la compra de productos.
 */
class CartController
{
    /**
     * Añade un producto al carrito. Si ya existe en la sesión se
     * incrementa su cantidad.
     *
     * @param int $id
     * @return void
     */
    public function add(int $id): void
    {
        // Inicializamos el carrito si no existe
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        // Incrementamos la cantidad o la ponemos a 1 si es nuevo
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] += 1;
        } else {
            $_SESSION['cart'][$id] = 1;
        }
        header('Location: ' . BASE_URL . 'cart.php');
        exit;
    }

    /**
     * Elimina completamente un producto del carrito.
     *
     * @param int $id
     * @return void
     */
    public function remove(int $id): void
    {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
        header('Location: ' . BASE_URL . 'cart.php');
        exit;
    }

    /**
     * Muestra la vista con el contenido del carrito.
     * @return void
     */
    public function view(): void
    {
        $items = [];
        $total = 0;
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $productModel = new Product();
            foreach ($_SESSION['cart'] as $productId => $qty) {
                $product = $productModel->find($productId);
                if ($product) {
                    $product['cantidad'] = $qty;
                    $product['subtotal'] = $product['precio'] * $qty;
                    $total += $product['subtotal'];
                    $items[] = $product;
                }
            }
        }
        include __DIR__ . '/../views/cart.php';
    }

    /**
     * Finaliza la compra. En un sistema real aquí se crearían los
     * registros en la base de datos para pedidos y detalles de pedido.
     * En este ejemplo simplemente limpia la sesión y muestra un mensaje
     * de confirmación.
     * @return void
     */
    public function checkout(): void
    {
        // Limpiamos el carrito
        unset($_SESSION['cart']);
        include __DIR__ . '/../views/checkout_success.php';
    }
}