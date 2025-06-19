<?php
require '../ModConexion/conexion.php';

if ($_POST) {
    $sql = "INSERT INTO cliente(nombre, dni) VALUES(:nom, :dni)";
    $ps = $cn->prepare($sql);
    $ps->bindParam(':nom', $_POST['nombre']);
    $ps->bindParam(':dni', $_POST['dni']);
    $ps->execute();
    header('Location: cargarclientes.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes</title>
    <link rel="stylesheet" href="../ModEstilo/style.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Registro de Clientes</h1>
        
        <form method="post" class="client-form">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre completo" required>
            </div>
            
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" placeholder="Ingrese el número de DNI" required>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Guardar Cliente</button>
                <a href="cargarclientes.php" class="btn btn-secondary">Ver Listado</a>
            </div>
        </form>
    </div>
</body>
</html>