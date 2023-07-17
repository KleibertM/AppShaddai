<?php
include '../procesos/conexion.php';
$stmt = $conexion->prepare("SELECT * FROM item");
$stmt->execute();
$cont = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario Productos</title>
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../css/init.css">
    <link rel="stylesheet" href="../css/style.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php include 'navadmin.php'; ?>
        <div class="main-container" >
        <div class="tite-table" > 
            <h1>Productos en Almacen</h1>
        </div>
        <div class="edit" >
            <a href="../procesos/producto/additem.php">Agregar Producto</a>
            <a href="../procesos/producto/modif.php">Editar Producto</a>
        </div>
    <table class="styled-table">
        <thead>
        <tr>
            <td class="table__header">Código</td>
            <td class="table__header">Nombre</td>
            <td class="table__header">Versión</td>
            <td class="table__header">Categoría</td>
            <td class="table__header">Editorial</td>
            <td class="table__header">Tipo de Letra</td>
            <td class="table__header">Fecha</td>
            <td class="table__header">Stock</td>
            <td class="table__header">Precio</td>
            <!--  <td></td>
            <td></td>-->
        </tr>
        </thead>
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tbody>
        <tr>
            <td class="table__item"><?php echo $row['coditem'];?></td>
            <td class="table__item"><?php echo $row['nombre'];?></td>
            <td class="table__item"><?php echo $row['version'];?></td>
            <td class="table__item"><?php echo $row['cat'];?></td>
            <td class="table__item"><?php echo $row['editorial'];?></td>
            <td class="table__item"><?php echo $row['letra'];?></td>
            <td class="table__item"><?php echo $row['fecha'];?></td>
            <td class="table__item"><?php echo $row['stock'];?></td>
            <td class="table__item"  style="color: green; font-weight: bold; ">S/ <?php echo $row['precio'];?></td>
            
            <!-- <td><a href="../procesos/producto/delete.php?id=<?php echo $row['coditem'];?>">Desactivar</a></td>
            <td><a href="../procesos/producto/activateitem.php?id=<?php echo $row['coditem'];?>">Activar</a></td>-->

        </tr>
        </tbody>
        <?php endwhile  ?>
    </table>
        </div>
    

      <!----===== JS ===== -->
      <script src="../js/navbar.js"></script>
</body>
</html>
