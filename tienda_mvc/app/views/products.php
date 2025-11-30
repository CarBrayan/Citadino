<?php require __DIR__ . '/header.php'; ?>
<main class="container">
    <h1 class="mb-4">Productos disponibles</h1>
    <?php if (empty($products)): ?>
        <p>No hay productos disponibles en este momento.</p>
    <?php else: ?>
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="<?php echo BASE_URL . 'images/' . htmlspecialchars($product['imagen']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['nombre']); ?>">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['nombre']); ?></h5>
                            <p class="card-text">$<?php echo number_format($product['precio'], 0, ',', '.'); ?></p>
                            <p class="card-text flex-grow-1">
                                <?php echo nl2br(htmlspecialchars(substr($product['descripcion'], 0, 80))); ?>...
                            </p>
                            <div class="mt-auto">
                                <a href="<?php echo BASE_URL . 'product.php?id=' . $product['id']; ?>" class="btn btn-secondary w-100 mb-2">Ver detalle</a>
                                <a href="<?php echo BASE_URL . 'add_to_cart.php?id=' . $product['id']; ?>" class="btn btn-primary w-100">Añadir al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>
<?php require __DIR__ . '/footer.php'; ?>