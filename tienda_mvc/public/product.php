<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../app/controllers/ProductController.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$controller = new ProductController();
$controller->show($id);