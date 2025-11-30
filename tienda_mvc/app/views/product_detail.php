<?php require __DIR__ . '/header.php'; ?>
<main class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo BASE_URL . 'images/' . htmlspecialchars($product['imagen']); ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($product['nombre']); ?>">
        </div>
        <div class="col-md-6">
            <h2><?php echo htmlspecialchars($product['nombre']); ?></h2>
            <p class="fs-4 fw-bold text-danger">$<?php echo number_format($product['precio'], 0, ',', '.'); ?></p>
            <p><?php echo nl2br(htmlspecialchars($product['descripcion'])); ?></p>
            <p><strong>Stock:</strong> <?php echo (int)$product['stock']; ?></p>
            <a href="<?php echo BASE_URL . 'add_to_cart.php?id=' . $product['id']; ?>" class="btn btn-primary">Añadir al carrito</a>
        </div>
    </div>
    <div class="mt-4">
        <a href="<?php echo BASE_URL; ?>" class="btn btn-link">&laquo; Volver al catálogo</a>
    </div>
</main>
<?php require __DIR__ . '/footer.php'; ?>