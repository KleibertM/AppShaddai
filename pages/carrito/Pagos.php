<?php
// include database configuration file
include 'conexion.php';

// include MercadoPago library
require __DIR__ . '../../../vendor/autoload.php';

// initializ shopping cart class
include 'La-carta.php';
$cart = new Cart;

// redirect to home if cart is empty
if ($cart->total_items() <= 0) {
    echo '';
}

// set customer ID in session
if (isset($_SESSION['cliente'])) {
    // get customer details from session
    $custRow = $_SESSION['cliente'];
    $_SESSION['sessCustomerID'] = $custRow->codcliente;
} else {
    // set customer ID in session to default value
    $_SESSION['sessCustomerID'] = 1;
}

// get customer details by session customer ID
$query = $db->query("SELECT * FROM cliente WHERE codcliente = " . $_SESSION['sessCustomerID']);
$custRow = $query->fetch_assoc();

// Set Mercado Pago credentials
MercadoPago\SDK::setAccessToken("TEST-7186132166490018-060213-dc8a6f11c912d552cdc82029e131fd1e-1388941507");

// Create preference
$preference = new MercadoPago\Preference();

$preference->back_urls = array(
    "success" => "http://localhost/AppShaddai/pages/categoria/all.php",
    "failure" => "http://localhost/AppShaddai/pages/categoria/carrito/falla.php",
    //"pending" =>"http://localhost/shadday-master/html/categoria/carrito/falla.php",
);

$preference->auto_return = "approved";
$preference->binary_mode = true;
// Configure items
$items = [];
if ($cart->total_items() > 0) {
    // Get cart items from session
    $cartItems = $cart->contents();
    foreach ($cartItems as $item) {
        $product = new MercadoPago\Item();
        $product->title = $item["nombre"];
        $product->quantity = $item["cantidad"];
        if (isset($_POST['envio']) && strcasecmp($_POST['envio'], 'domicilio') === 0) {
            $product->unit_price = $item["precio"] + 15;  // Aumentar $15 al precio total
        } else {
            $product->unit_price = $item["precio"];
        }
        $items[] = $product;
    }
}
$preference->items = $items;
$preference->save();


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Pagos - PHP Carrito de compras Tutorial</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        .container {
            padding: 20px;
            height: 70vh;
        }

        .table, .btn-mp {
            width: 65%;
            float: left;
        }

        .shipAddr {
            width: 30%;
            float: left;
            margin-left: 30px;
        }

        .footBtn {
            width: 95%;
            float: left;
        }

        .orderBtn {
            float: right;
        }
    </style>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>

<body>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul class="nav nav-pills">
                    <li role="presentation"><a href="VerCarta.php">Atras</a></li>
                    <li role="presentation"><a href="VerCarta.php">Carrito de Compras</a></li>
                </ul>
            </div>

            <div class="panel-body">
                <h1>Vista previa de la Orden</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Sub total</th>
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
                                    <td><?php echo $item["cantidad"]; ?></td>
                                    <td><?php echo 'S/ ' . $item["subtotal"] . ' Soles'; ?></td>
                                </tr>
                        <?php }
                        } else { ?>
                            <tr>
                                <td colspan="4">
                                    <p>No hay articulos en tu carrito......</p>
                                </td>
                            <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <td colspan="3"></td>
                            <?php if ($cart->total_items() > 0) { ?>
                                <td class="text-center"><strong>Total <span id="total-pagar-domicilio"><?php echo 'S/ ' . $cart->total() . ' .'; ?></span></strong></td>
                            <?php } ?>

                        </tr>
                    </tfoot>
                    <div id="liveAlertPlaceholder"></div>
                </table>
<div class="shipAddr">
    <h4>Detalles de envío:</h4>
    <form method="post" action="pagar.php" id="envio-form">
        <div id="envio-form2" >
            <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Teléfono:</label>
                <input type="text" class="form-control" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Dirección:</label>
                <textarea class="form-control" name="address" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label>Tipo de envío:</label><br>
            <label><input type="radio" name="envio" value="recojo" onclick="showTiendaDireccion()"> Recojo en tienda</label><br>
            
            <label><input type="radio" name="envio" value="domicilio" id="liveAlertBtn" onclick="hideTiendaDireccion()"> Envío a domicilio (+ S/ 15)</label>
        </div>

        <div id="direccion-tienda" style="display: none;">
            <label>Dirección de la tienda:</label>
            <p class="direccion-tienda" >Jr. Manuel Gonzales Prada 877, Los Olivos.  <a href="https://goo.gl/maps/gxwSTJo1MaqF4uTy8" target="_blank" ><i class='bx bx-map'></i> Mapa</a> </p>
        </div>

        <input type="hidden" name="total" id="total" value="<?php echo $cart->total(); ?>">
        <div class="footBtn">
            <a href="../categoria/all.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Comprar Mas</a>
            <button type="submit" id="pago-btn" class="btn btn-success orderBtn">Pagar S/ <?php echo $cart->total(); ?> Soles</button>

            <p id="pago-btn2" class="btn-mp btn" ></p>
        </div>
    </form>
    
</div>

<div class="clearfix"></div>
</div>
</div>

<script>
    let envioAgregado = false;

    function showTiendaDireccion() {
        let total = parseFloat(document.getElementById("total").value);
        if (envioAgregado) {
            total -= 15;
            envioAgregado = false;
        }
        document.getElementById("direccion-tienda").style.display = "block";
        document.getElementById("envio-form2").style.display = "none";
        document.getElementById("total").value = total.toFixed(2);
        document.getElementById("pago-btn").innerHTML = "Pagar S/ " + total.toFixed(2) + " Soles";
        document.getElementById("total-pagar-domicilio").innerHTML = 'S/ ' + total.toFixed(2) + ' .';
    }

    function hideTiendaDireccion() {
    let total = parseFloat(document.getElementById("total").value);
    if (!envioAgregado) {
        total += 15;
        envioAgregado = true;
    }
    document.getElementById("direccion-tienda").style.display = "none";
    document.getElementById("envio-form2").style.display = "block";
    document.getElementById("total").value = total.toFixed(2);
    document.getElementById("pago-btn").innerHTML = "Pagar S/ " + total.toFixed(2) + " Soles";
    document.getElementById("total-pagar-domicilio").innerHTML = 'S/ ' + total.toFixed(2) + ' .';
}

const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
const appendAlert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '</div>'
  ].join('')

  alertPlaceholder.append(wrapper)
}

const alertTrigger = document.getElementById('liveAlertBtn')
if (alertTrigger) {
  alertTrigger.addEventListener('click', () => {
    appendAlert('El Pago  del DELIVERY es CONTRA ENTREGA', 'success')
  })
}

</script>


<script>
    const mp = new MercadoPago('TEST-d67a4d50-47a5-4d72-ad62-54b8b031f4d9');
    const bricksBuilder = mp.bricks();

    mp.bricks().create("wallet", "pago-btn2", {
        initialization: {
            preferenceId: "<?php echo $preference->id; ?>",
        },
    });
</script>
</body>
</html>




