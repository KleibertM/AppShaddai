<?php
/*session_start();

require '../../php/procesos/conexion.php';

// Asegurarse de que el usuario haya iniciado sesión
if (!isset($_SESSION['user'])) {
    // Redirigir a la página de inicio de sesión u otra página apropiada
    header("Location: ../../../index.php");
    exit();
}

if (isset($_SESSION['historial_compras'])) {
  $historialCompras = $_SESSION['historial_compras'];

  // Mostrar los datos del historial de compras
  foreach ($historialCompras as $compra) {
      // Accede a los datos de cada compra y muestra la información relevante
      echo "ID de venta: " . $compra->id_venta . "<br>";
      echo "Fecha de venta: " . $compra->fecha_venta . "<br>";
      // Muestra otros campos relevantes de la venta
      echo "<br>";
  }
} else {
  // No hay historial de compras disponible
  echo "No hay historial de compras disponible";
}
?>

<?php
                    // Mostrar el historial de compras
                    if (isset($historialCompras)) {
                        foreach ($historialCompras as $compra) {
                            // Mostrar cada compra en una fila de la tabla
                            ?>
                            <tr>
                                <td><?php echo $compra->producto; ?></td>
                                <td><?php echo $compra->precio; ?></td>
                                <td><?php echo $compra->cantidad; ?></td>
                                <td><?php echo $compra->subtotal; ?></td>
                                <td></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

