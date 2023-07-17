<?php
require '../conexion.php';

if (!empty($_POST['additem'])) {
    if (empty($_POST['nombre'])|| empty($_FILES['foto']) || empty($_POST['version']) || empty($_POST['categoria']) || empty($_POST['editorial']) || empty($_POST['descripcion']) || empty($_POST['npag']) || empty($_POST['letra']) || empty($_POST['fecha']) || empty($_POST['stock']) || empty($_POST['precio'])) {
        echo "<div class='alert alert_info'>Uno de los campos está vacío</div>";
    } else {
    
        $nombre = $_POST['nombre'];
        $foto = $_FILES['foto']['name'];
        $archivo = $_FILES['foto']['tmp_name'];
        $version = $_POST['version'];
        $categoria = $_POST['categoria'];
        $editorial = $_POST['editorial'];
        $descripcion = $_POST['descripcion'];
        $npag = $_POST['npag'];
        $letra = $_POST['letra'];
        $fecha = $_POST['fecha'];
        $stock = $_POST['stock'];
        $precio = $_POST['precio'];

        $ruta = "../../imagen/" . $foto;
        $base = "../../imagen/" . $foto;

        move_uploaded_file($archivo, $ruta);

        $stmt = $conexion->prepare("SELECT * FROM item WHERE nombre = :nombre");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo '<div class="alert alert_error">Libro ya Registrado</div>';
        } else {
        $stmt = $conexion->prepare("INSERT INTO item (nombre, foto, version, categoria, editorial, descripcion, npag, letra, fecha, stock, precio) VALUES ('$nombre', '$base', '$version', '$categoria', '$editorial','$descripcion','$npag','$letra', '$fecha', '$stock', '$precio')");
        

        if ($stmt->execute()) {

            header('Location: ../../html/items.php ');

            echo '<div class="alert alert_exitosa">Producto registrado correctamente</div>';
        } else {
            echo '<div class="alert alert_error">Error al registrar producto</div>';
        }
        
    }
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="../../css/add.css">
    
</head>
<body>
    <div class="contenedor" >
        <h2 class="titulo" >Agragar Nuevo Producto</h2>
        <form action="additem.php" method="POST" enctype="multipart/form-data" >
            <input type="text" id="nombre" name="nombre" placeholder="Nombre de Prodcuto" required><br>

            <input type="file" id="foto" name="foto" placeholder="Foto del Producto" required><br>

            <input type="text" id="version" name="version" placeholder="Version" required><br><br>

            <select name="categoria" id="categoria" required>
                    <option disabled selected value="">Seleccione una Categoria</option>
                    <option value="9001">Damas</option>
                    <option value="9002">Caballeros</option>
                    <option value="9003">Niños</option>
                    <option value="9004">Bolsillo</option>
                </select> <br>

            <input type="text" id="editorial" name="editorial" placeholder="Editorial" required><br>

            <input type="text" id="descripcion" name="descripcion" placeholder="Resumen" required><br>

            <input type="text" id="npag" name="npag" placeholder="Numero de Paginas" required><br>

            <select name="letra" id="letra" required>
                    <option disabled selected value="">Tipo de Letra</option>
                    <option value="2001">Letra Normal</option>
                    <option value="2002">Letra Grande</option>
                    <option value="2003">Letra Enorme</option>
                </select> <br>

            <input type="date" id="fecha" name="fecha" placeholder="Fecha de Fabricacion" required><br>

            <input type="number" id="stock" name="stock" placeholder="Stock Disponible" required><br>

            <input type="number" id="precio" name="precio" placeholder="Precio de Venta" required><br>

           <div class="btn" >
            <input type="submit" name="additem" value="Registrar">
            <input  class="btn-red" type="reset" value="Cancelar" >
           </div>
        </form>

    </div>
</body>
</html>