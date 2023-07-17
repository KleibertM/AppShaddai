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
    .cont-soport {
      margin: 0 auto;
      max-width: 1000px;
      padding: 20px;
    }
    
    .cont-soport h1 {
    background-color: var(--primary-color);
    color: var(--toggle-color);
      padding: 20px;
      margin: 0;
      text-align: center;
    }
    
    .cont-soport h2 {
      margin-top: 40px;
        color: var(--text-color);
    }
    
    .cont-soport ul {
      margin: 10px 0;
      padding: 0 0 0 40px;
      color: var(--text-color);
    }
    
    .cont-soport p {
      margin: 10px 0;
        color: var(--text-color);
    }
    
  </style>
<body>

  <?php include 'navbar.php'; ?>

  <section class="home">
    <!--===== pagina de soporte de pagina de biblias =====-->
    <div class="cont-soport">
    <h1>Política de Soporte de SHADDAI</h1>
  
  <div class="conta">
    <h2>Horario de atención</h2>
    <p>Estamos disponibles para brindar soporte técnico de lunes a viernes, de 8:00 a.m. a 6:00 p.m. Los sábados y domingos, nuestro equipo de soporte técnico no está disponible.</p>
    
    <h2>Tiempos de respuesta</h2>
    <p>Intentamos responder a todas las consultas y solicitudes de soporte técnico lo antes posible. Nuestro tiempo de respuesta objetivo es de 24 horas para las consultas por correo electrónico y de 2 horas para las consultas por teléfono. Sin embargo, puede haber momentos en que nuestro tiempo de respuesta sea más largo debido a una carga de trabajo excepcionalmente alta o a circunstancias imprevistas.</p>
    
    <h2>Tipos de soporte</h2>
    <p>Ofrecemos soporte técnico a través de correo electrónico y teléfono. Si necesita ayuda con uno de nuestros productos o servicios, no dude en contactarnos.</p>
    
    <h2>Soporte técnico para productos fuera de garantía</h2>
    <p>Ofrecemos soporte técnico para productos fuera de garantía a un costo adicional. El costo del soporte técnico dependerá del tipo de producto y del tipo de soporte requerido.</p>
    
    <h2>Garantía de devolución de dinero</h2>
    <p>Ofrecemos una garantía de devolución de dinero de 30 días para todos nuestros productos y servicios. Si no está satisfecho con uno de nuestros productos o servicios, contáctenos dentro de los primeros 30 días después de la compra y le proporcionaremos un reembolso completo.</p>
    
    <h2>Política de privacidad</h2>
    <p>Para obtener más información sobre nuestra política de privacidad, visite nuestra página de Política de Privacidad.</p>
    
    <h2>Contacto</h2>
    
    <p>Si tiene alguna pregunta o inquietud sobre nuestra política de soporte, no dude en ponerse en contacto con nosotros a través de nuestro sitio web.</p>
    <div class="main-icons">
      <i class='bx bxl-facebook'></i>
      <i class='bx bxl-whatsapp' ></i>
      <i class='bx bxl-twitter' ></i>
    </div>
  </div>

    </div>

    <script src="../js/navbar.js"></script>

</body>

</html>