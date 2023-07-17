<?php

date_default_timezone_set("America/Lima");
include 'La-carta.php';
$cart = new Cart;
include 'conexion.php';

if (isset($_REQUEST['action']) && !empty($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['coditem'])) {
        // Obtener el ID del producto y la cantidad
        $productID = $_REQUEST['coditem'];
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 1;

        // Obtener los detalles del producto desde la base de datos
        $query = $db->query("SELECT * FROM item WHERE coditem = " . $productID);
        $item = $query->fetch_assoc();
        $query->free_result();

        // Verificar si se encontró el producto
        if ($item) {
            $itemData = array(
                'coditem' => $item['coditem'],
                'nombre' => $item['nombre'],
                'precio' => $item['precio'],
                'cantidad' => $cantidad
            );

            // Insertar el producto en el carrito
            $insertItem = $cart->insert($itemData);
            $redirectLoc = $insertItem ? 'VerCarta.php' : 'index.php';
            header("Location: " . $redirectLoc);
        } else {
            header("Location: ../../index.php");
        }
    } elseif ($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['coditem'])) {
        // Obtener la cantidad actualizada
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : 1;
        $itemData = array(
            'rowid' => $_REQUEST['coditem'],
            'cantidad' => $cantidad
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem ? 'ok' : 'err';
        die;
    } elseif ($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['coditem'])) {
        // Eliminar el producto del carrito
        $deleteItem = $cart->remove($_REQUEST['coditem']);
        header("Location: VerCarta.php");
    } elseif ($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])) {
        // Verificar si se enviaron los datos de envío
        if (isset($_POST['envio']) && isset($_POST['direccion_envio'])) {
            // Recopilar los datos de envío del formulario
            $envio = $_POST['envio'];
            $direccionEnvio = $_POST['direccion_envio'];

            // Insertar detalles del pedido en la base de datos
            $insertOrder = $db->prepare("INSERT INTO venta (idcliente, total, fecha_hora, envio, direccion_envio) VALUES (?, ?, ?, ?, ?)");
            $insertOrder->bind_param("idsss", $_SESSION['sessCustomerID'], $cart->total(), date("Y-m-d H:i:s"), $envio, $direccionEnvio);
            $insertOrder->execute();

            // Verificar si la inserción fue exitosa
            if ($insertOrder->affected_rows > 0) {
                $orderID = $insertOrder->insert_id;
                $insertOrder->close();

                // Insertar los productos del carrito en la base de datos
                $insertOrderItems = $db->prepare("INSERT INTO detalleventa (venta_FK, item_FK, cantidad) VALUES (?, ?, ?)");
                foreach ($cart->contents() as $item) {
                    $insertOrderItems->bind_param("iii", $orderID, $item['coditem'], $item['cantidad']);
                    $insertOrderItems->execute();
                }
                $insertOrderItems->close();

                // Actualizar el inventario y eliminar el carrito
                $updateInventory = $db->prepare("UPDATE item SET stock = stock - ? WHERE coditem = ?");
                foreach ($cart->contents() as $item) {
                    $updateInventory->bind_param("ii", $item['cantidad'], $item['coditem']);
                    $updateInventory->execute();
                }
                $updateInventory->close();

                $cart->destroy();
                header("Location: OrdenExito.php?coditem=$orderID");
            } else {
                header("Location: Pagos.php");
            }
        } else {
            header("Location: Pagos.php");
        }
    } else {
        header("Location: ../../index.php");
    }
} else {
    header("Location: ../../index.php");
}
