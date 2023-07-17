<?php

$payment = $_GET['payment_id'];
$payment = $_GET['status'];
$payment = $_GET['payment_type'];
$payment = $_GET['payment_order_id'];

echo "<h3>Pago Exitoso</h3>";

echo $payment. '<br>';
echo $status. '<br>';
echo $payment_type. '<br>';
echo $order_id. '<br>';

?>