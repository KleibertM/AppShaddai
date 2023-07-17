<?php

// initializ shopping cart class
include 'La-carta.php';
$cart = new Cart;


// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
	header("Location: index.php");
	exit();
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Ver Carrito</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        .container {
            padding: 20px;
        }

        input[type="number"] {
            width: 20%;
        }
    </style>
    <script>
        function updateCartItem(obj, coditem) {
            $.get("cartAction.php", {
                action: "updateCartItem",
                coditem: coditem,
                cantidad: obj.value
            }, function(data) {
                if (data == 'ok') {
                    location.reload();
                } else {
                    alert('Cart update failed, please try again.');
                }
            });
        }
    </script>
</head>

<body>

    <div class="container">
        <div id="paymentResult"></div>
        <div class="panel panel-default">
            <div class="panel-heading">

                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="VerCarta.php">Carrito de Compras</a></li>
                </ul>
            </div>

            <div class="panel-body">
                <h1>Carrito de compras</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Sub total</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($cart->total_items() > 0) {
                            //get cart items from session
                            $cartItems = $cart->contents();
                            foreach ($cartItems as $item) {
                                ?>
                                <tr>
                                    <td><?php echo $item["nombre"]; ?></td>
                                    <td><?php echo 'S/ ' . $item["precio"] . ' Soles'; ?></td>
                                    <td><input type="number" class="form-control text-center" value="<?php echo $item["cantidad"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                                    <td><?php echo 'S/ ' . $item["subtotal"] . ' Soles'; ?></td>
                                    <td>
                                        <a href="AccionCarta.php?action=removeCartItem&coditem=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Confirma eliminar?')"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="5">
                                    <p>No has solicitado ningún producto.....</p>
                                </td>
                            <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><a href="../categoria/all2.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Volver a la tienda</a></td>
                            <td colspan="2"></td>
                            <?php if ($cart->total_items() > 0) { ?>
                                <td class="text-center"><strong>Total <?php echo 'S/ ' . $cart->total() . ' .'; ?></strong></td>
                                <td><a href="Pagos.php" class="btn btn-success btn-block">Pagar<i class="glyphicon glyphicon-menu-right"></i></a></td>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
