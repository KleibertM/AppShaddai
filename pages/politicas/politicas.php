<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
	header("Location: index.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!----======== CSS ======== -->
  <link rel="stylesheet" href="../css/style.css">
  <!----===== Boxicons CSS ===== -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


 <!--<title>"" politicas</title>-->

</head>

<style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .cont-polit {
      margin: 0 auto;
      max-width: 1000px;
      padding: 20px;
    }
    
    .cont-polit h1 {
      background-color: var(--primary-color);
      color: var(--toggle-color);
      padding: 20px;
      margin: 0;
      text-align: center;
    }
    
    .cont-polit h2 {
      margin-top: 40px;
      color: var(--text-color);
    }
    
    .cont-polit ul {
      margin: 10px 0;
      padding: 0 0 0 40px;
      color: var(--text-color);
    }
    
    .cont-polit p {
      margin: 10px 0;
      color: var(--text-color);
    }
  </style>
<body>
  <?php include 'navbar.php'; ?>


  <section class="home">
    <!--===== pagina de politica de pagina de biblias =====-->
    <div class="cont-polit">
    <h1>Política de privacidad de SHADDAI</h1>
  
  <h2>Información personal recopilada</h2>
  <p>Recopilamos información personal cuando los clientes se registran en nuestra página, realizan una compra o se suscriben a nuestro boletín. Esta información puede incluir:</p>
  <ul>
    <li>Nombre</li>
    <li>Dirección de correo electrónico</li>
    <li>Dirección postal</li>
    <li>Número de teléfono</li>
    <li>Información de pago</li>
  </ul>
  <p>Utilizamos esta información para procesar las órdenes de compra, enviar actualizaciones sobre el estado de la orden y para fines de marketing. También podemos utilizar esta información para mejorar nuestros servicios y productos.</p>
  
  <h2>Cookies</h2>
  <p>Utilizamos cookies en nuestro sitio web para mejorar la experiencia del usuario y para recopilar información sobre el uso de nuestro sitio. Las cookies son pequeños archivos de texto que se almacenan en el navegador del usuario para recordar la información y las preferencias del usuario.</p>
  
  <h2>Divulgación de información personal</h2>
  <p>No vendemos ni compartimos la información personal de nuestros clientes con terceros, excepto cuando sea necesario para procesar una orden o cuando estemos obligados por ley a hacerlo.</p>
  
  <h2>Seguridad de la información personal</h2>
  <p>Tomamos medidas de seguridad para proteger la información personal de nuestros clientes. Utilizamos software de seguridad de alta calidad y cifrado de datos para proteger la información personal de nuestros clientes.</p>
  
  <h2>Cambios en la política de privacidad</h2>
  <p>Nos reservamos el derecho de cambiar esta política de privacidad en cualquier momento sin previo aviso. Los cambios serán publicados en esta página y serán efectivos en el momento en que se publiquen.</p>
  
  <h2>Contacto</h2>
  <p>Si tiene alguna pregunta o inquietud sobre nuestra política de privacidad, no dude en ponerse en contacto con nosotros a través de nuestro sitio web.</p>
  <div class="main-icons">
    <i class='bx bxl-facebook'></i>
    <i class='bx bxl-whatsapp' ></i>
    <i class='bx bxl-twitter' ></i>
  </div>
  <p>Fecha de entrada en vigencia: [Fecha]</p>

    </div>

    <script src="../js/navbar.js"></script>
</body>

</html>