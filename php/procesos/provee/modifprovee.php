<?php 
require_once "../conexion.php";

if (!empty($_GET['modificarpro'])) {

    $idprovee = $_GET['idprovee'];
    $ruc = isset($_GET['ruc']) ? $_GET['ruc'] : '';
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
    $telefono = isset($_GET['telefono']) ? $_GET['telefono'] : '';
    $direccion = isset($_GET['direccion']) ? $_GET['direccion'] : '';
    $correo = isset($_GET['correo']) ? $_GET['correo'] : '';
    
    $sql = '';
    
    if (!empty($ruc)) {
        $sql .= "ruc=:ruc,";
    }
    if (!empty($nombre)) {
        $sql .= "nombre=:nombre,";
    }
    if (!empty($telefono)) {
        $sql .= "telefono=:telefono,";
    }
    if (!empty($direccion)) {
        $sql .= "direccion=:direccion,";
    }
    if (!empty($correo)) {
        $sql .= "correo=:correo,";
    }
    
    $sql = rtrim($sql, ',');
    
    // Si no se ha ingresado ningún dato para actualizar
    if (empty($sql)) {
        echo "<div class='alert alert_info'>No se ha ingresado ningún dato para actualizar.</div>";
        return;
    }
    
    $sql = $conexion->prepare("UPDATE provee SET $sql WHERE idprovee=:idprovee");
    $sql->bindParam(":idprovee", $idprovee);
    
    if (!empty($ruc)) {
        $sql->bindParam(":ruc", $ruc);
    }
    if (!empty($nombre)) {
        $sql->bindParam(":nombre", $nombre);
    }
    if (!empty($telefono)) {
        $sql->bindParam(":telefono", $telefono);
    }
    if (!empty($direccion)) {
        $sql->bindParam(":direccion", $direccion);
    }
    if (!empty($correo)) {
        $sql->bindParam(":correo", $correo);
    }
    
    if ($sql->execute()) {
        echo '<p class="alert alert_exitosa">Datos actualizados correctamente.</p>';
       
        header('Location: ../../html/provee.php');
        
    } else {
        echo "<p class='alert alert_error'>No se han podido actualizar los datos.</p>";
        
    }
    
}
?>
