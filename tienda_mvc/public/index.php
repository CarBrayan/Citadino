<?php
// Punto de entrada principal. Muestra el listado de productos a los
// visitantes.
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../app/controllers/ProductController.php';

$controller = new ProductController();
$controller->index();