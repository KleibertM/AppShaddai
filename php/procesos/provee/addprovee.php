<?php
include  "../conexion.php";

if (!empty($_POST['addprovee'])) {
    if (empty($_POST['ruc']) || empty($_POST['nombre']) || empty($_POST['telefon']) || empty($_POST['direccion']) || empty($_POST['correo'])) {
        echo "<div class='alert alert_info'>Uno de los campos está vacío</div>";
    } else {
        $ruc = $_POST['ruc'];
        $nombre = $_POST['nombre'];
        $telefon = $_POST['telefon'];
        $direccion = $_POST['direccion'];
        $correo = $_POST['correo'];

        $stmt = $conexion->prepare("SELECT * FROM provee WHERE ruc = :ruc");
        $stmt->bindParam(':ruc', $ruc);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo '<div class="alert alert_error">El RUC ya está registrado</div>';
        } else {
            $stmt = $conexion->prepare("SELECT * FROM provee WHERE correo = :correo");
            $stmt->bindParam(':correo', $correo);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                echo '<div class="alert alert_error">El correo electrónico ya está registrado</div>';
            } else {
                $stmt = $conexion->prepare("INSERT INTO provee (ruc, nombre, telefon, direccion, correo) VALUES (:ruc, :nombre, :telefon, :direccion, :correo)");
                $stmt->bindParam(':ruc', $ruc);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':telefon', $telefon);
                $stmt->bindParam(':direccion', $direccion);
                $stmt->bindParam(':correo', $correo);
                
                if ($stmt->execute()) {

                    header('Location: addprovee.php');

                    echo '<div class="alert alert_exitosa">Proveedor registrado correctamente</div>';
                } else {
                    echo '<div class="alert alert_error">Error al registrar proveedor</div>';
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedor</title>
    <link rel="stylesheet" href="../../css/add.css">
</head>
<body>
    <div class="contenedor" >
        <div class="titulo" >
            <h2>Registro Proveedor</h2>
        </div>
        <form action="addprovee.php"  method="POST"  >
            <input type="number" id="ruc" name="ruc" placeholder="RUC" required><br>

            <input type="text" id="nombre" name="nombre" placeholder="Nombre / Razon Social" required><br>

            <input type="number" id="telefon" name="telefon" placeholder="Numero Telefonico" required><br>

            <input type="text" id="direccion" name="direccion" placeholder="Direccion" required><br>

            <input type="email" id="correo" name="correo" placeholder="Correo Electronico" required><br>

            <div class="btn" >
            <input type="submit" name="addprovee" value="Registrar">
            </div>
        </form>
    </div>
</body>
</html>