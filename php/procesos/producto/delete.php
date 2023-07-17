<?php
require_once "../conexion.php";

if(isset($_GET['id'])) {
    $coditem = $_GET['id'];

$eliminar = $conexion->prepare("DELETE FROM item WHERE coditem = :coditem");
$eliminar->bindParam(':coditem', $coditem);

if ($eliminar->execute()) {
    echo "Datos eliminados correctamente..";
    
    header("Location: ../../html/items.php");
exit();

} else {
    echo "No se ha podido eliminar los datos..";
    header("Location: ../../html/items.php");
}
}
?>