<?php
require '../ModConexion/conexion.php';
$sql = "SELECT * FROM producto ORDER BY nombre";
$productos = $cn->query($sql)->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="../ModEstilo/style.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Listado de Productos</h1>
        
        <div class="actions">
            <a href="guardarproductos.php" class="btn btn-primary">Nuevo Producto</a>
        </div>
        
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Stock</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if (count($productos) > 0): ?>
                        <?php foreach ($productos as $p): ?>
                        <tr>
                            <td><?= htmlspecialchars($p['id']) ?></td>
                            <td><?= htmlspecialchars($p['nombre']) ?></td>
                            <td>S/ <?= number_format($p['precio'], 2) ?></td>
                            <td><?= htmlspecialchars($p['stock']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="no-data">No hay productos registrados</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>