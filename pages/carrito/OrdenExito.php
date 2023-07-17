<?php
// Verifica que la sesión esté iniciada y que exista una conexión a la base de datos
session_start();
require 'conexion.php';

// Obtén los datos de envío de la base de datos
$orderID = $_GET['coditem'];
$query = $db->query("SELECT envio, direccion_envio FROM venta WHERE idventa = " . $orderID);
$orderData = $query->fetch_assoc();
$envio = $orderData['envio'];
$direccionEnvio = $orderData['direccion_envio'];

// Muestra los datos de envío en la página
echo "<h2>Datos de envío:</h2>";
echo "<p>Método de envío: " . $envio . "</p>";
echo "<p>Dirección de envío: " . $direccionEnvio . "</p>"; 

if (!isset($_REQUEST['coditem'])) {
  header("Location: ../../index.php");
  exit; // Agrega esta línea para detener la ejecución del código después de redirigir
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <title>Orden Completada - PHP Carrito de Compras</title>
  <meta charset="utf-8">
  <style>
    .container {
      padding: 20px;
    }

    p {
      color: #34a853;
      font-size: 18px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        <ul class="nav nav-pills">
          <li role="presentation" class="active"><a href="Pagos.php">Volver</a></li>
          <li role="presentation" class="active Pagar"><a href="procesar_pago.php">Pagar Ahora</a></li>
        </ul>
      </div>

      <div class="panel-body">
        <h1>Estado de tu Requerimiento</h1>
        <p>La Orden se ha enviado exitósamente. El ID de tu pedido es <?php echo $_GET['coditem']; ?></p>

        
      </div>
    </div>
    <!--Panek cierra-->
  </div>
</body>

</html>
