<?php require __DIR__ . '/header.php'; ?>
<main class="container">
    <h1 class="mb-4">Tu carrito de compras</h1>
    <?php if (empty($items)): ?>
        <p>No hay productos en tu carrito.</p>
        <a href="<?php echo BASE_URL; ?>" class="btn btn-primary">Seguir comprando</a>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th class="text-end">Precio</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-end">Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo BASE_URL . 'images/' . htmlspecialchars($item['imagen']); ?>" alt="<?php echo htmlspecialchars($item['nombre']); ?>" width="60" class="me-3 rounded">
                                    <div>
                                        <div class="fw-bold"><?php echo htmlspecialchars($item['nombre']); ?></div>
                                        <small class="text-muted">ID: <?php echo $item['id']; ?></small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-end">$<?php echo number_format($item['precio'], 0, ',', '.'); ?></td>
                            <td class="text-center"><?php echo $item['cantidad']; ?></td>
                            <td class="text-end">$<?php echo number_format($item['subtotal'], 0, ',', '.'); ?></td>
                            <td class="text-end">
                                <a href="<?php echo BASE_URL . 'remove_from_cart.php?id=' . $item['id']; ?>" class="btn btn-sm btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total</th>
                        <th class="text-end">$<?php echo number_format($total, 0, ',', '.'); ?></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="d-flex justify-content-between">
            <a href="<?php echo BASE_URL; ?>" class="btn btn-link">&laquo; Seguir comprando</a>
            <a href="<?php echo BASE_URL; ?>checkout.php" class="btn btn-success">Finalizar compra</a>
        </div>
    <?php endif; ?>
</main>
<?php require __DIR__ . '/footer.php'; ?>