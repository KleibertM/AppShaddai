<?php
include '../conexion.php';

if (isset($_GET['id'])) {
    $coditem = $_GET['id'];

    // Actualizar el estado de la venta del producto a activado (1)
    $stmt = $conexion->prepare("UPDATE item SET activo = 1 WHERE coditem = :coditem");
    $stmt->bindParam(':coditem', $coditem);
    $stmt->execute();

    // Redirigir a la página de productos en almacen después de activar la venta
    header("Location: ../../html/items.php");
    exit();
} else {
    // Redirigir a la página de productos en almacen si no se proporciona el ID del producto
    header("Location: ../../html/items.php");
    exit();
}
?>