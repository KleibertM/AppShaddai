<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
	header("Location: index.php");
	exit();
}

require '../../php/procesos/conexion.php';


$sql = "SELECT * FROM item WHERE cat = 'DAMAS'";
$result = $conexion->query($sql);

if ($result->rowCount() > 0) {
    // Crear un array vacío para almacenar los datos de las películas
    $girl = array();

    // Recorrer los resultados de la consulta y almacenar los datos de las películas en el array
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $girl[] = $row;
    }
} else {
    echo "No se encontraron películas";
}
// Cerrar la conexión con la base de datos
$pdo = null;

$sql = "SELECT * FROM item WHERE cat = 'CABALLEROS' ";
$result = $conexion->query($sql);

if ($result->rowCount() > 0) {
    // Crear un array vacío para almacenar los datos de las películas
    $men = array();

    // Recorrer los resultados de la consulta y almacenar los datos de las películas en el array
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $men[] = $row;
    }
} else {
    echo "No se encontraron películas";
}
// Cerrar la conexión con la base de datos
$pdo = null;

$sql = "SELECT * FROM item WHERE cat = 'NIÑOS' ";
$result = $conexion->query($sql);

if ($result->rowCount() > 0) {
    // Crear un array vacío para almacenar los datos de las películas
    $kids = array();

    // Recorrer los resultados de la consulta y almacenar los datos de las películas en el array
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $kids[] = $row;
    }
} else {
    echo "No se encontraron películas";
}
// Cerrar la conexión con la base de datos
$pdo = null;

$sql = "SELECT * FROM item WHERE cat = 'BOLSILLOS' ";
$result = $conexion->query($sql);

if ($result->rowCount() > 0) {
    // Crear un array vacío para almacenar los datos de las películas
    $saco = array();

    // Recorrer los resultados de la consulta y almacenar los datos de las películas en el array
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $saco[] = $row;
    }
} else {
    echo "No se encontraron películas";
}
// Cerrar la conexión con la base de datos
$pdo = null;

$sql = "SELECT * FROM item ";
$result = $conexion->query($sql);

if ($result->rowCount() > 0) {
    // Crear un array vacío para almacenar los datos de las películas
    $all = array();

    // Recorrer los resultados de la consulta y almacenar los datos de las películas en el array
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $all[] = $row;
    }
} else {
    echo "No se encontraron películas";
}
// Cerrar la conexión con la base de datos
$pdo = null;

// Verificar si hay artículos en el carrito
$cart_items_count = isset($_SESSION['cart_items']) ? count($_SESSION['cart_items']) : 0;


?>

<!DOCTYPE html>
<html lang="es" >

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="description" content="Venta de Biblias - SHADDAI. Explora nuestra amplia selección de Biblias y encuentra la que mejor se adapte a tus necesidades espirituales.">
    <meta name="keywords" content="Venta de Biblias, SHADDAI, Biblias de estudio, Biblia devocional, Biblia infantil, Comprar Biblias, Fe y espiritualidad, Palabra de Dios, Guía espiritual, Lectura de la Biblia, Reflexiones espirituales">
    
    <title>Catálogo de Libros</title>
    <link rel="stylesheet" href="../../CSSs/ctlg.css">
    <link rel="stylesheet" href="../../CSSs/prin.css">
    <link rel="stylesheet" href="../../CSSs/nav.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
<div class="link-chat" >
        <a href="https://wa.me/51912933385?text=Hola, quiero Comprar una Biblia" target="_blank" ><i class='bx bxl-whatsapp'></i> </a>     
    </div> 
<header class="box-header" >
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" style="height: 70px; ">
            <div class="container">
            <a class="navbar-brand" id="logo" href="../user/user.php">Shaddai</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../user/user.php"><i class='bx bxs-home-heart'></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../carrito/VerCarta.php"><i class='bx bxs-book-alt'></i> Carrito</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="pedidos.php"><i class='bx bxs-box'></i> Pedidos</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bxs-face'></i>  Cuenta
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item btn-primary" href="../categoria/damas.php"><i class='bx bxs-happy'></i> Perfil</a></li>
                        <li><a class="dropdown-item btn-cerrar" href="../../php/procesos/cerrar.php"><i class='bx bxs-exit'></i> Cerrar Seccion</a></li>
                    </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                </div>
            </div>
        </nav>
        <div>
            <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 80px;">
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>CATEGORIAS</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link active link-info" id="men-tab" data-bs-toggle="tab" data-bs-target="#men-tab-pane" type="button" role="tab" aria-controls="men-tab-pane" aria-selected="true"><i class='bx bx-male'></i> Caballero</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link link-danger" id="girl-tab" data-bs-toggle="tab" data-bs-target="#girl-tab-pane" type="button" role="tab" aria-controls="girl-tab-pane" aria-selected="false"><i class='bx bx-female' ></i> Damas</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link link-success" id="kids-tab" data-bs-toggle="tab" data-bs-target="#kids-tab-pane" type="button" role="tab" aria-controls="kids-tab-pane" aria-selected="false"><i class='bx bx-child' ></i> Niños</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link link-primary" id="saco-tab" data-bs-toggle="tab" data-bs-target="#saco-tab-pane" type="button" role="tab" aria-controls="saco-tab-pane" aria-selected="false"><i class='bx bxs-bible'></i> Bolsillo</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link  link-warning" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button" role="tab" aria-controls="all-tab-pane" aria-selected="false"><i class='bx bx-library'></i> Todo</button>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent"> 
              <div class="tab-pane fade show active" id="men-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
              <section class="home" id="men" style="margin-top: 10px; background-color: azure;">
              <div class="ctlg">
              <div class="titulo">
                <h1 style="text-align: center;">Conocimientos de Dios</h1>
              </div>
              <div class="container">
                <?php foreach ($men as $item): ?>
                  <div class="box-book" style="background-color: white;"  data-id="<?php echo $item['coditem']; ?>">
                    <img src="https://sbp.org.pe/wp-content/uploads/2021/07/Biblia-7898521818173.png" alt="<?php echo $item['nombre']; ?>">
                    <div class="book-info">
                      <h3 class="book-title"><?php echo $item['nombre']; ?></h3>
                      <p class="book-author"><?php echo $item['version']; ?></p>
                      <p class="book-author"><?php echo $item['cat']; ?></p>
                      <p class="book-price">S/ <?php echo $item['precio']; ?></p>
                    </div>
                    <form action="../carrito/AccionCarta.php?action=addToCart" method="POST">
                      <input type="hidden" name="coditem" value="<?php echo $item['coditem']; ?>">
                      <input type="hidden" name="nombre" value="<?php echo $item['nombre']; ?>">
                      <input type="hidden" name="precio" value="<?php echo $item['precio']; ?>">
                      <select name="cantidad" class="cant-select" >
                        <?php for ($cont = 1; $cont <= 100; $cont++): ?>
                          <option value="<?php echo $cont; ?>"><?php echo $cont; ?></option>
                        <?php endfor; ?>
                      </select>
                      <div class="btn-buy" >
                        <button type="submit" class="a-buy"> comprar </button>
                      </div>
                    </form>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
              </section>
            </div>

            <div class="tab-pane fade" id="girl-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
              <section class="home" id="girl" style="margin-top: 10px;" >
              <div class="ctlg">
                <div class="titulo">
                  <h1 style="text-align: center;">Conocimientos de Dios</h1>
                </div>
                <div class="container">
                  <?php foreach ($girl as $item): ?>
                    <div class="box-book" style="background-color: white;" data-id="<?php echo $item['coditem']; ?>">
                      <img src="<?php echo $item['foto']; ?>" alt="<?php echo $item['nombre']; ?>">
                      <div class="book-info">
                        <h3 class="book-title"><?php echo $item['nombre']; ?></h3>
                        <p class="book-author"><?php echo $item['version']; ?></p>
                        <p class="book-author"><?php echo $item['cat']; ?></p>
                        <p class="book-price">S/ <?php echo $item['precio']; ?></p>
                      </div>
                      <form action="../carrito/AccionCarta.php?action=addToCart" method="POST">
                        <input type="hidden" name="coditem" value="<?php echo $item['coditem']; ?>">
                        <input type="hidden" name="nombre" value="<?php echo $item['nombre']; ?>">
                        <input type="hidden" name="precio" value="<?php echo $item['precio']; ?>">
                        <select name="cantidad" class="cant-select" >
                          <?php for ($cont = 1; $cont <= 100; $cont++): ?>
                            <option value="<?php echo $cont; ?>"><?php echo $cont; ?></option>
                          <?php endfor; ?>
                        </select>
                        <div class="btn-buy" >
                          <button type="submit" class="a-buy"> comprar </button>
                        </div>
                      </form>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </section>
          </div>

          <div class="tab-pane fade" id="kids-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
            <section class="home" id="kids" style="margin-top: 10px; ">
            <div class="ctlg">
              <div class="titulo">
                <h1 style="text-align: center;">Conocimientos de Dios</h1>
              </div>
              <div class="container">
                <?php foreach ($kids as $item): ?>
                  <div class="box-book" style="background-color: white;"  data-id="<?php echo $item['coditem']; ?>">
                    <img src="<?php echo $item['foto']; ?>" alt="<?php echo $item['nombre']; ?>">
                    <div class="book-info">
                      <h3 class="book-title"><?php echo $item['nombre']; ?></h3>
                      <p class="book-author"><?php echo $item['version']; ?></p>
                      <p class="book-author"><?php echo $item['cat']; ?></p>
                      <p class="book-price">S/ <?php echo $item['precio']; ?></p>
                    </div>
                    <form action="../carrito/AccionCarta.php?action=addToCart" method="POST">
                      <input type="hidden" name="coditem" value="<?php echo $item['coditem']; ?>">
                      <input type="hidden" name="nombre" value="<?php echo $item['nombre']; ?>">
                      <input type="hidden" name="precio" value="<?php echo $item['precio']; ?>">
                      <select name="cantidad" class="cant-select" >
                        <?php for ($cont = 1; $cont <= 100; $cont++): ?>
                          <option value="<?php echo $cont; ?>"><?php echo $cont; ?></option>
                        <?php endfor; ?>
                      </select>
                      <div class="btn-buy" >
                        <button type="submit" class="a-buy"> comprar </button>
                      </div>
                    </form>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </section>
        </div>

          <div class="tab-pane fade" id="saco-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
            <section class="home" id="saco" style="margin-top: 10px;">
              <div class="ctlg">
                <div class="titulo">
                  <h1 style="text-align: center;">Conocimientos de Dios</h1>
                </div>
                <div class="container">
                  <?php foreach ($saco as $item): ?>
                    <div class="box-book" style="background-color: white;"  data-id="<?php echo $item['coditem']; ?>">
                      <img src="<?php echo $item['foto']; ?>" alt="<?php echo $item['nombre']; ?>">
                      <div class="book-info">
                        <h3 class="book-title"><?php echo $item['nombre']; ?></h3>
                        <p class="book-author"><?php echo $item['version']; ?></p>
                        <p class="book-author"><?php echo $item['cat']; ?></p>
                        <p class="book-price">S/ <?php echo $item['precio']; ?></p>
                      </div>
                      <form action="../carrito/AccionCarta.php?action=addToCart" method="POST">
                        <input type="hidden" name="coditem" value="<?php echo $item['coditem']; ?>">
                        <input type="hidden" name="nombre" value="<?php echo $item['nombre']; ?>">
                        <input type="hidden" name="precio" value="<?php echo $item['precio']; ?>">
                        <select name="cantidad" class="cant-select" >
                          <?php for ($cont = 1; $cont <= 100; $cont++): ?>
                            <option value="<?php echo $cont; ?>"><?php echo $cont; ?></option>
                          <?php endfor; ?>
                        </select>
                        <div class="btn-buy" >
                          <button type="submit" class="a-buy"> comprar </button>
                        </div>
                      </form>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </section>
          </div>

            <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0">
                <section class="home" id="all" style="margin-top: 10px;">
                  <div class="ctlg">
                    <div class="titulo">
                      <h1 style="text-align: center;">Conocimientos de Dios</h1>
                    </div>
                    <div class="container">
                      <?php foreach ($all as $item): ?>
                        <div class="box-book" style="background-color: white;"  data-id="<?php echo $item['coditem']; ?>">
                          <img src="<?php echo $item['foto']; ?>" alt="<?php echo $item['nombre']; ?>">
                          <div class="book-info">
                            <h3 class="book-title"><?php echo $item['nombre']; ?></h3>
                            <p class="book-author"><?php echo $item['version']; ?></p>
                            <p class="book-author"><?php echo $item['cat']; ?></p>
                            <p class="book-price">S/ <?php echo $item['precio']; ?></p>
                          </div>
                          <form action="../carrito/AccionCarta.php?action=addToCart" method="POST">
                            <input type="hidden" name="coditem" value="<?php echo $item['coditem']; ?>">
                            <input type="hidden" name="nombre" value="<?php echo $item['nombre']; ?>">
                            <input type="hidden" name="precio" value="<?php echo $item['precio']; ?>">
                            <select name="cantidad" class="cant-select" >
                              <?php for ($cont = 1; $cont <= 100; $cont++): ?>
                                <option value="<?php echo $cont; ?>"><?php echo $cont; ?></option>
                              <?php endfor; ?>
                            </select>
                            <div class="btn-buy" >
                              <button type="submit" class="a-buy"> comprar </button>
                            </div>
                          </form>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </section>
              </div>
            </div>
    </header>

<script>
    fetch(`jestt.php?coditem=${item['coditem']}`)
  </script>
  

</body>

</html>
