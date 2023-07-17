<?php
require '../../procesos/conexion.php';
// Obtener el ID del libro seleccionado
$itemId = $_GET['coditem'];

// Consultar la base de datos para obtener los detalles del libro correspondiente
$sql = "SELECT * FROM item WHERE coditem = :coditem";
$stmt = $conexion->prepare($sql);
$stmt->execute(['coditem' => $itemId]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);

// Devolver los detalles del libro en formato JSON
header('Content-Type: application/json');
echo json_encode($item);
?>