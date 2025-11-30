<?php
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../../config.php';

/**
 * Controlador de productos. Gestiona la visualización del listado de
 * productos y de la ficha individual de un producto.
 */
class ProductController
{
    /**
     * Muestra el listado de todos los productos disponibles.
     * @return void
     */
    public function index(): void
    {
        $productModel = new Product();
        $products = $productModel->all();
        include __DIR__ . '/../views/products.php';
    }

    /**
     * Muestra la ficha de un producto concreto. Si no existe el ID, se
     * redirecciona al listado general.
     * @param int $id
     * @return void
     */
    public function show(int $id): void
    {
        $productModel = new Product();
        $product = $productModel->find($id);
        if (!$product) {
            header('Location: ' . BASE_URL);
            exit;
        }
        include __DIR__ . '/../views/product_detail.php';
    }
}