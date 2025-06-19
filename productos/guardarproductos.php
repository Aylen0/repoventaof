<?php
require '../ModConexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    
    $sql = "INSERT INTO producto (nombre, precio, stock) VALUES (:nombre, :precio, :stock)";
    $ps = $cn->prepare($sql);
    $ps->bindParam(':nombre', $nombre);
    $ps->bindParam(':precio', $precio);
    $ps->bindParam(':stock', $stock);
    $ps->execute();
    
    header('Location: cargarproductos.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="../ModEstilo/style.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Agregar Nuevo Producto</h1>
        
        <form method="post" class="product-form">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto" required>
            </div>
            
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" min="0" placeholder="0.00" required>
            </div>
            
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" min="0" placeholder="Cantidad disponible" required>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Guardar Producto</button>
                <a href="cargarproductos.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>