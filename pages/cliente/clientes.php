<?php
include '../procesos/conexion.php';
$stmt = $conexion->prepare("SELECT * FROM cliente");
$stmt->execute();
$cont = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes</title>
    <link rel="stylesheet" href="../css/test.css">
    <link rel="stylesheet" href="../css/init.css">
    <link rel="stylesheet" href="../css/style.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<?php include 'navadmin.php'; ?>
    <div class="main-container" >
    <div class="tite-table" > 
            <h1>Clientes Registrados</h1>
        </div>
        <div class="edit" >
            <a href="../procesos/cliente/modifc.php">Modificar Datos</a>
        </div>
    <table class="styled-table" >
        <thead>
        <tr>
            <td class="table__header">Código Cliente</td>
            <td class="table__header">Nombre</td>
            <td class="table__header">Apellido</td>
            <td class="table__header">Teléfono</td>
            <td class="table__header">DNI</td>
            <td class="table__header">Dirección</td>
            <td class="table__header">Edad</td>
            <td class="table__header">Sexo</td>
            <td class="table__header">Correo</td>
            <td class="table__header">Usuario</td>
            <td class="table__header">Admin</td>
        </tr>
        </thead>
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tbody>
        <tr>
            <td class="table__item"><?php echo $row['codcliente']; ?></td>
            <td class="table__item"><?php echo $row['nombre']; ?></td>
            <td class="table__item"><?php echo $row['apellido']; ?></td>
            <td class="table__item"><?php echo $row['telefono']; ?></td>
            <td class="table__item"><?php echo $row['dni']; ?></td>
            <td class="table__item"><?php echo $row['direccion']; ?></td>
            <td class="table__item"><?php echo $row['edad']; ?></td>
            <td class="table__item"><?php echo $row['sexo']; ?></td>
            <td class="table__item"><?php echo $row['correo']; ?></td>
            <td class="table__item"><?php echo $row['user']; ?></td>
            <td class="table__item"><?php echo $row['admin']; ?></td>
        </tr>
        </tbody>
        <?php endwhile; ?>
    </table>
    </div>


      <!----===== JS ===== -->
      <script src="../js/navbar.js"></script>
</body>
</html>
