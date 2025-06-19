<?php
$usuario = "postgres";
$clave = "123";
$basedatos = "ventasdb";
$host = "l10.0.221.105";
$puerto = "5432";

try {
    $cn = new PDO("pgsql:host=$host;port=$puerto;dbname=$basedatos", $usuario, $clave);
    $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    $cn = null; 
}
?>