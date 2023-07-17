
<?php
include '../../php/procesos/conexion.php';

$idVenta = 'idventa';

$stmt = "SELECT * FROM detalleventa 
         INNER JOIN venta ON detalleventa.venta_FK = venta.idventa 
         INNER JOIN cliente ON cliente.codcliente  = venta.idcliente";

try {
    $result = $conexion->query($stmt);
    
    if ($result !== false) {
        // Comprueba si hay resultados
        if ($result->rowCount() > 0) {
            // Crear un array vacío para almacenar los datos
            $items = array();

            // Recorrer los resultados de la consulta y almacenar los datos en el array
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $items[] = $row;
            }
        } else {
            echo "No se encontraron registros";
        }
    } else {
        echo "Error en la consulta";
    }
} catch (Exception $e) {
    echo "Error en la consulta: " . $e->getMessage();
}

// Cerrar la conexión con la base de datos
$conexion = null;
?>



<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Factura de compra</title>

    <!-- CSS de Bootstrap -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../../CSSs/prin.css">
    <link rel="stylesheet" href="../../CSSs/nav.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    
   <header class="box-header " >
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top  position-relative">
            <div class="container">
                <a class="navbar-brand" id="logo" href="user.php">Shaddai</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="user.php"><i class='bx bxs-home-heart'></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../ventas/ventas.php"><i class='bx bxs-purchase-tag'></i> Ventas</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../categoria/all2.php"><i class='bx bxs-book-alt'></i> Catalogo</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bxs-face'></i> Cuenta
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item btn-primary" href="profile.php"><i class='bx bxs-happy'></i> Perfil</a></li>
                        <li><a class="dropdown-item btn-cerrar" href="../../php/procesos/cerrar.php"><i class='bx bxs-exit'></i> Cerrar Seccion</a></li>
                    </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                </div>
            </div>
        </nav>
    </header>

	 <div class="container" >
     <div class="main-container" >
     <div class="tite-table" > 
        <h1>Facturas</h1>
    </div>
     <div class="edit">
        <a href="../ventas/detalles_venta/detVenta.php">Detalles de venta</a>
     </div>
	<table class="table table-hover container" >
        <thead>
            <tr>
                <td class="table__header">N. Venta</td>
                <td class="table__header">N. Det. Venta</td>
                <td class="table__header">N. Cliente</td>
                <td class="table__header">Fecha y Hora</td>
                <td class="table__header">N. Producto</td>
                <td class="table__header">Nom. Producto</td>
                <td class="table__header">Cantidad</td>
                <td class="table__header">Precio Unitario</td>
                <td class="table__header">Total</td>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <tr class="table-active">
                    <td class="table__item"><?php echo $row['idventa']; ?></td>
                    <td class="table__item"><?php echo $row['idcliente']; ?></td>
                    <td class="table__item"><?php echo $row['fecha_hora']; ?></td>
                    <td class="table__item"><?php echo $row['item_FK']; ?></td>
                    <td class="table__item"><?php echo $row['nombre']; ?></td>
                    <td class="table__item"><?php echo $row['cantidad']; ?></td>
                    <td class="table__item"><?php echo $row['precio']; ?></td>
                    <td class="table__item"><?php echo $row['total']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>
    </div>
</body>
</html>
