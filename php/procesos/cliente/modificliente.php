<?php 

header("Location: {$_SERVER['HTTP_REFERER']}");
exit();

require '../conexion.php';

if (!empty($_GET['modificar'])) {

    $codcliente = $_GET['codcliente'];
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
    $apellido = isset($_GET['apellido']) ? $_GET['apellido'] : '';
    $telefono = isset($_GET['telefono']) ? $_GET['telefono'] : '';
    $dni = isset($_GET['dni']) ? $_GET['dni'] : '';
    $direccion = isset($_GET['direccion']) ? $_GET['direccion'] : '';
    $edad = isset($_GET['edad']) ? $_GET['edad'] : '';
    $sexo= isset($_GET['sexo']) ? $_GET['sexo'] : '';
    $correo = isset($_GET['correo']) ? $_GET['correo'] : '';
    $user = isset($_GET['user']) ? $_GET['user'] : '';
    $clave = isset($_GET['clave']) ? $_GET['clave'] : '';
    
    $sql = '';
    
    if (!empty($nombre)) {
        $sql .= "nombre=:nombre,";
    }
    if (!empty($apellido)) {
        $sql .= "apellido= :apellido,";
    }
    if (!empty($telefono)) {
        $sql .= "telefono=:telefono,";
    }
    if (!empty($dni)) {
        $sql .= "dni=:dni,";
    }
    if (!empty($direccion)) {
        $sql .= "direccion=:direccion,";
    }
    if (!empty($edad)) {
        $sql .= "edad=:edad,";
    }
    if (!empty($sexo)) {
        $sql .= "sexo=:sexo,";
    }
    if (!empty($correo)) {
        $sql .= "correo=:correo,";
    }
    if (!empty($user)) {
        $sql .= "user=:user,";
    }
    if (!empty($clave)) {
        $sql .= "clave=:clave,";
    }
    
    $sql = rtrim($sql, ',');
    
    // Si no se ha ingresado ningún dato para actualizar
    if (empty($sql)) {
        echo "<div class='alert alert_info'>No se ha ingresado ningún dato para actualizar.</div>";
        return;
    }
    
    $sql = $conexion->prepare("UPDATE cliente SET $sql WHERE codcliente=:codcliente");
    $sql->bindParam(":codcliente", $codcliente);
    
    if (!empty($nombre)) {
        $sql->bindParam(":nombre", $nombre);
    }
    if (!empty($apellido)) {
        $sql->bindParam(":apellido", $apellido);
    }
    if (!empty($telefono)) {
        $sql->bindParam(":telefono", $telefono);
    }
    if (!empty($dni)) {
        $sql->bindParam(":dni", $dni);
    }
    if (!empty($direccion)) {
        $sql->bindParam(":direccion", $direccion);
    }
    if (!empty($edad)) {
        $sql->bindParam(":edad", $edad);
    }
    if (!empty($sexo)) {
        $sql->bindParam(":sexo", $sexo);
    }
    if (!empty($correo)) {
        $sql->bindParam(":correo", $correo);
    }
    if (!empty($user)) {
        $sql->bindParam(":user", $user);
    }
    if (!empty($clave)) {
        $sql->bindParam(":clave", $clave);
    }
    
    if ($sql->execute()) {
        echo '<p class="alert alert_exitosa">Datos actualizados correctamente.</p>';
        
    } else {
        echo "<p class='alert alert_error'>No se han podido actualizar los datos.</p>";
        
    }
    
    }
?>