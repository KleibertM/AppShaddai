
<?php
include '../../php/procesos/conexion.php';
$stmt = $conexion->prepare("SELECT * FROM venta ORDER BY idventa desc");
$stmt->execute();
$cont = 0;
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>

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

<table class="table table-hover container">
  <thead>
    <tr>
      <td class="table__header">Número de Orden</td>
      <td class="table__header">Fecha y Hora</td>
      <td class="table__header">Total</td>
      <td class="table__header">Detalles</td>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
    <tr class="table-active">
      <td class="table__item"><?php echo $row['idventa']; ?></td>
        <td class="table__item"><?php echo $row['fecha_hora']; ?></td>
        <td class="table__item" style="color: green; font-weight: bold; ">S/ <?php echo $row['total']; ?></td>
        <td class="table__item"><a href="../factura/factura.php?idventa=<?php echo $row['idventa']; ?>">Detalles de venta</a></td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
</body>
</html>
