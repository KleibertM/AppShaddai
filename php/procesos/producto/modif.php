$<?php
include_once '../conexion.php';

$stmt = $conexion->prepare("SELECT * FROM provee");
$stmt->execute();
$cont = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    
    <link rel="stylesheet" href="../../css/add.css">
</head>
<body>  
    <?php 
    require 'modifitem.php';?>
<div class="contenedor">
    <form action="modifitem.php" name="modificar" method="GET">
        <h2 class="title">ID de Producto</h2>
        <select name="coditem" required="">
            <?php
            // Realizar la consulta para obtener los códigos de los productos
            $stmt = $conexion->prepare("SELECT coditem, nombre FROM item");
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $row['coditem'] . $row['nombre'] . "'> " . $row['coditem'] . " " . $row['nombre'] . "</option>";
            }
            ?>
        </select><br><br>
        
        <h2>Datos a Modiicar</h2>
        
        <input type="text" name="nombre" placeholder="Nombre" ><br>

        <input type="text" id="version" name="version" placeholder="Version" ><br>

        <input type="text" id="cat" name="cat" placeholder="Categoria" ><br>

        <input type="text" id="editorial" name="editorial" placeholder="Editorial" ><br>

        <input type="date" id="fecha" name="fecha" placeholder="Fecha de F." ><br>

        <input type="number" id="stock" name="stock" placeholder="Stock" ><br>

        <input type="number" id="precio" name="precio" placeholder="Precio" ><br>

        <div class="btn" >
            <input type="submit" name="actualizar" value="Remplazar">
        </div>
    </form>
    </div> 

</body>
</html>