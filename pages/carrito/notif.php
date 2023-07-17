<?php
// include MercadoPago library
require __DIR__ . '../../../vendor/autoload.php';

// include database configuration file
include 'conexion.php';

// Set Mercado Pago credentials
MercadoPago\SDK::setAccessToken("TEST-7186132166490018-060213-dc8a6f11c912d552cdc82029e131fd1e-1388941507");

// Procesar la notificación
$notification = MercadoPago\Notification::read();

// Verificar la autenticidad de la notificación
if ($notification->valid()) {
    // Obtener el estado del pago
    $paymentStatus = $notification->type;

    if ($paymentStatus == 'payment') {
        // Obtener el ID de la preferencia de pago y el monto total del pago
        $preferenceId = $notification->data->id;
        $orderTotal = $notification->data->transaction_amount;

        // Generar la orden y realizar las operaciones necesarias
        $insertOrder = $db->query("INSERT INTO venta (idcliente, total, fecha_hora) VALUES ('".$_SESSION['sessCustomerID']."', '".$orderTotal."', '".date("Y-m-d H:i:s")."')");

        if ($insertOrder) {
            $orderID = mysqli_insert_id($db);
            $sql = '';
            // Obtener los productos del carrito
            $cartItems = $cart->contents();
            foreach ($cartItems as $item) {
                $sql .= "INSERT INTO detalleventa (venta_FK, item_FK, cantidad) VALUES ('".$orderID."', '".$item['coditem']."', '".$item['cantidad']."');";
            }
            // Insertar los productos de la orden en la base de datos
            $insertOrderItems = $db->multi_query($sql);
            if ($insertOrderItems) {
                // Actualizar el inventario
                foreach ($cartItems as $item) {
                    $updateInventory = $db->query("UPDATE item SET stock = stock - " . $item['cantidad'] . " WHERE coditem = " . $item['coditem']);
                    if (!$updateInventory) {
                        die("Error al actualizar el inventario para el producto con ID " . $item['coditem']);
                    }
                }

                // Destruir el carrito
                $cart->destroy();

                // Responder con una respuesta exitosa a Mercado Pago
                http_response_code(200);
            } else {
                // Ocurrió un error al insertar los productos de la orden, responder con un error
                http_response_code(500);
            }
        } else {
            // Ocurrió un error al insertar la orden, responder con un error
            http_response_code(500);
        }
    } else {
        // La notificación no es de tipo pago, no hacer nada
        http_response_code(200);
    }
} else {
    // La notificación no es auténtica, responder con un error
    http_response_code(403);
}
?>
