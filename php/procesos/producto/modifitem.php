<?php 
require_once "../conexion.php";

if (!empty($_GET['actualizar'])) {

    $coditem = $_GET['coditem'];
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
    $version = isset($_GET['version']) ? $_GET['version'] : '';
    $categoria = isset($_GET['cat']) ? $_GET['cat'] : '';
    $editorial = isset($_GET['editorial']) ? $_GET['editorial'] : '';
    $fecha = isset($_GET['fecha']) ? $_GET['fecha'] : '';
    $stock = isset($_GET['stock']) ? $_GET['stock'] : '';
    $precio= isset($_GET['precio']) ? $_GET['precio'] : '';
    $descripcion = isset($_GET['descripcion']) ? $_GET['descripcion'] : '';
    $npag = isset($_GET['npag']) ? $_GET['npag'] : '';
    $letra= isset($_GET['letra']) ? $_GET['letra'] : '';
    
    
    
    $sql = '';
    
    if (!empty($nombre)) {
        $sql .= "nombre=:nombre,";
    }
    if (!empty($version)) {
        $sql .= "version= :version,";
    }
    if (!empty($categoria)) {
        $sql .= "cat=:cat,";
    }
    if (!empty($editorial)) {
        $sql .= "editorial=:editorial,";
    }
    if (!empty($fecha)) {
        $sql .= "fecha=:fecha,";
    }
    if (!empty($stock)) {
        $sql .= "stock=:stock,";
    }
    if (!empty($precio)) {
        $sql .= "precio=:precio,";
    }
    if (!empty($descripcion)) {
        $sql .= "descripcion=:descripcion,";
    }
    if (!empty($descripcion)) {
        $sql .= "descripcion=:descripcion,";
    }
    if (!empty($npag)) {
        $sql .= "npag=:npag,";
    }
    if (!empty($letra)) {
        $sql .= "letra=:letra,";
    }
    
    
    
    
    $sql = rtrim($sql, ',');
    
    // Si no se ha ingresado ningún dato para actualizar
    if (empty($sql)) {
        echo "<div class='alert alert_info'>No se ha ingresado ningún dato para actualizar.</div>";
        return;
    }
    
    $sql = $conexion->prepare("UPDATE item SET $sql WHERE coditem=:coditem");
    $sql->bindParam(":coditem", $coditem);
    
    if (!empty($nombre)) {
        $sql->bindParam(":nombre", $nombre);
    }
    if (!empty($version)) {
        $sql->bindParam(":version", $version);
    }
    if (!empty($categoria)) {
        $sql->bindParam(":cat", $categoria);
    }
    if (!empty($editorial)) {
        $sql->bindParam(":editorial", $editorial);
    }
    if (!empty($fecha)) {
        $sql->bindParam(":fecha", $fecha);
    }
    if (!empty($stock)) {
        $sql->bindParam(":stock", $stock);
    }
    if (!empty($precio)) {
        $sql->bindParam(":precio", $precio);
    }
    if (!empty($descripcion)) {
        $sql->bindParam(":descripcion", $descripcion);
    }
    if (!empty($npag)) {
        $sql->bindParam(":npag", $npag);
    }
    if (!empty($letra)) {
        $sql->bindParam(":letra", $letra);
    }
    
    
    if ($sql->execute()) {
        echo '<p class="alert alert_exitosa">Datos actualizados correctamente.</p>';
       
        header('Location: ../../html/items.php');
        
    } else {
        echo "<p class='alert alert_error'>No se han podido actualizar los datos.</p>";
        
    }
    
    }
    
    ?>
?>
