<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
	header("Location: ../../index.php");
	exit();
}
require '../../php/procesos/conexion.php';

$sql = "SELECT * FROM item LIMIT 3";
$result = $conexion->query($sql);

if ($result->rowCount() > 0) {
    // Crear un array vacío para almacenar los datos de las películas
    $items = array();

    // Recorrer los resultados de la consulta y almacenar los datos de las películas en el array
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $items[] = $row;
    }
} else {
    echo "No se encontraron películas";
}
// Cerrar la conexión con la base de datos
$pdo = null;

$sql = "SELECT * FROM item WHERE cat = 'NIÑOS'  LIMIT 3";
$result = $conexion->query($sql);

if ($result->rowCount() > 0) {
    // Crear un array vacío para almacenar los datos de las películas
    $books = array();

    // Recorrer los resultados de la consulta y almacenar los datos de las películas en el array
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $books[] = $row;
    }
} else {
    echo "No se encontraron películas";
}
// Cerrar la conexión con la base de datos
$pdo = null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Venta de Biblias - SHADDAI. Explora nuestra amplia selección de Biblias y encuentra la que mejor se adapte a tus necesidades espirituales.">
    <meta name="keywords" content="Venta de Biblias, SHADDAI, Biblias de estudio, Biblia devocional, Biblia infantil, Comprar Biblias, Fe y espiritualidad, Palabra de Dios, Guía espiritual, Lectura de la Biblia, Reflexiones espirituales">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    
    <!-- CSS de Bootstrap -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../../CSSs/prin.css">
    <link rel="stylesheet" href="../../CSSs/nav.css">

    <title>Shadday - Venta de Biblias</title>
</head>
<body>
<div class="link-chat" >
        <a href="https://wa.me/51912933385?text=Hola, quiero Comprar una Biblia" target="_blank" ><i class='bx bxl-whatsapp'></i> </a>     
    </div>  
    
    
    
    <section class="main-section">
    <div class="container-fluid">
        <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <header class="box-header" >
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container">
                <a class="navbar-brand" id="logo" href="user.php">Shaddai</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="user.php"><i class='bx bxs-home-heart'></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../carrito/VerCarta.php"><i class='bx bxs-cart-alt'></i> Carrito</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../carrito/VerCarta.php"><i class='bx bxs-box'></i> Pedidos</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../categoria/all2.php"><i class='bx bxs-book-alt'></i> Catalogo</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bxs-face'></i> Cuenta
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item btn-primary" href="profile.php"><i class='bx bxs-happy'></i> Perfil</a></li>
                        <li><a class="dropdown-item btn-cerrar" href="../../php/procesos/cerrar.php"><i class='bx bxs-exit'></i> Cerrar Seccion</a></li>
                    </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                </div>
            </div>
        </nav>
    </header>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../../assets/images/firt_cat/fondos/reinavelrainfo.png" alt="Biblia 1" class="w-100">
                    <div class="carousel-caption">
                        <a href="#">Ver mas</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../../assets/images/firt_cat/fondos/2.png" alt="Biblia 2" class="w-100">
                    <div class="carousel-caption">
                        <a href="#">Ver mas</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../../assets/images/firt_cat/fondos/3.png" alt="Biblia 3" class="w-100">
                    <div class="carousel-caption">
                        <a href="#">Ver mas</a>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="../../assets/images/firt_cat/fondos/4.png" alt="Biblia 2" class="w-100">
                    <div class="carousel-caption">
                        <a href="#">Ver mas</a>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
            <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
        </div>
    </div>
    </section>

    <div class="main-header ">
    <div class="container ">
            <h1>Venta de Biblias</h1>
            <h2>Encuentra la Biblia perfecta para ti</h2>
            <p>Explora nuestra amplia selección de Biblias y encuentra la que mejor se adapte a tus necesidades espirituales.</p>
            
        <div class="container items ">
            <div class="row ">
                <div class="row g-4">
                    <div class="card-group d-flex align-content-start flex-wrap">
                        <?php foreach ($items as $item): ?>
                            <div class="box-book card-body " data-id="<?php echo $item['coditem']; ?>">
                            <img src="../../assets/images/firt_cat/img/2.jpg"  alt="<?php echo $item['nombre']; ?>">
                            <div class="book-info">
                                <h3 class="book-title card-title"><?php echo $item['nombre']; ?></h3>
                                <p class="book-author card-text"><?php echo $item['version']; ?></p>
                                <p class="book-author card-text"><?php echo $item['cat']; ?></p>
                                <p class="book-price card-text">S/ <?php echo $item['precio']; ?></p>
                            </div>
                            <form action="carrito/AccionCarta.php?action=addToCart" method="POST">
                                <input type="hidden" name="coditem" value="<?php echo $item['coditem']; ?>">
                                <input type="hidden" name="nombre" value="<?php echo $item['nombre']; ?>">
                                <input type="hidden" name="precio" value="<?php echo $item['precio']; ?>">
                                <select name="cantidad" class="cant-select" >
                                <?php for ($cont = 1; $cont <= 30; $cont++): ?>
                                    <option value="<?php echo $cont; ?>"><?php echo $cont; ?></option>
                                <?php endfor; ?>
                                </select>
                                <div class="btn-buy" >
                                <button type="submit" class="a-buy btn btn-success"> comprar </button>
                                </div>
                            </form>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

    <div class="box-card">
    <div class="card container">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="../../assets/images/firt_cat/fondos/reinavelrainfo.png" class="img-fluid rounded-start" alt="...">
            </div> 
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">Biblia Reina Valera 1960</h5><br>
                    <p class="card-text"> La versión de la Biblia Reina Valera 1960 es apreciada por su precisión, su legado histórico, su lenguaje accesible, su versatilidad y su impacto duradero en la vida de los creyentes. <br> <br>Esta versión continúa siendo una herramienta valiosa para aquellos que desean profundizar en su fe y conocer la voluntad de Dios a través de sus enseñanzas eternas.</p><br>
                    <p class="card-text"><small class="text-body-secondary"> <a href="https://www.biblia.es/reina-valera-1960.php" target="_blank" > Biblia Online </a> </small></p>
                </div> 
            </div>
        </div>
    </div>
</div>

<div class="book-hot" >
        <section class="main-section books">
            <div class="container set-hot">
                <h2 class="main-section-title">Curiosidades - La Santisima Trinidad - ¿Sabias Que?</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                    <img src="https://media.minutouno.com/p/02e36ffe029941895decfb2c244bbe0a/adjuntos/150/imagenes/029/200/0029200770/1200x675/smart/diosjpg.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">El Padre</h5>  
                        <p class="card-text">El Padre es el creador del cielo y la tierra, y es amoroso y misericordioso. Él es el origen de toda vida y el sostén del universo. Como Padre, <b>Dios nos ama incondicionalmente y nos guía con sabiduría y cuidado.</b> Él envió a su Hijo, Jesucristo, al mundo para salvar a la humanidad del pecado y la separación de Dios.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary"> <i class='bx bx-book-open'></i> Mateo 6:9 / Juan 14:6</small>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                    <img src="https://assets.epuzzle.info/puzzle/095/677/original.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">El Hijo</h5>
                        <p class="card-text">El Hijo, Jesucristo, es la encarnación de Dios en forma humana. Él nació de la Virgen María y vivió una vida perfecta en obediencia a la voluntad del Padre. <b>Jesús enseñó el amor de Dios, realizó milagros y sacrificó su vida en la cruz para redimirnos del pecado.</b> Su muerte y resurrección nos ofrecen la salvación y la esperanza de la vida eterna.</p>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary"> <i class='bx bx-book-open'></i> Juan 1:1, 14 / Juan 14:9 </small>
                    </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                    <img src="https://wp.es.aleteia.org/wp-content/uploads/sites/7/2017/11/maxresdefault.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Espiritu Santo</h5>
                            <p class="card-text">El Espíritu Santo es la tercera persona de la Trinidad y es enviado por el Padre y el Hijo para habitar en los creyentes. <b>Él es nuestro Consolador, Ayudador y Guía.</b> El Espíritu Santo nos convence del pecado, nos capacita para vivir una vida santa y nos fortalece para ser testigos de Jesús en el mundo. Él nos concede dones espirituales para edificar la iglesia y nos ayuda a comprender y aplicar la Palabra de Dios.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary"><i class='bx bx-book-open'></i> Juan 14:26 / Hechos 1:8 </small>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>

    <div class="box-items-2" >
        <div class="container items items-2">
        <div class="row ">
                <div class="row g-4">
                    <h3>Biblias Para Caballeros</h3>
                    <div class="card-group d-flex align-content-start flex-wrap">
                        <?php foreach ($items as $item): ?>
                            <div class="box-book card-body " data-id="<?php echo $item['coditem']; ?>">
                            <img src="../../assets/images/firt_cat/img/2.jpg"  alt="<?php echo $item['nombre']; ?>">
                            <div class="book-info">
                                <h3 class="book-title card-title"><?php echo $item['nombre']; ?></h3>
                                <p class="book-author card-text"><?php echo $item['version']; ?></p>
                                <p class="book-author card-text"><?php echo $item['cat']; ?></p>
                                <p class="book-price card-text">S/ <?php echo $item['precio']; ?></p>
                            </div>
                            <form action="carrito/AccionCarta.php?action=addToCart" method="POST">
                                <input type="hidden" name="coditem" value="<?php echo $item['coditem']; ?>">
                                <input type="hidden" name="nombre" value="<?php echo $item['nombre']; ?>">
                                <input type="hidden" name="precio" value="<?php echo $item['precio']; ?>">
                                <select name="cantidad" class="cant-select" >
                                <?php for ($cont = 1; $cont <= 30; $cont++): ?>
                                    <option value="<?php echo $cont; ?>"><?php echo $cont; ?></option>
                                <?php endfor; ?>
                                </select>
                                <div class="btn-buy" >
                                <button type="submit" class="a-buy btn btn-success"> comprar </button>
                                </div>
                            </form>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    


    <div class="box-map" > 
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Accordion Item #1
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card-body">
                                    <h5 class="card-title">Puedes Acercarte a Nuestra Tienda</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    </div>
                                    <div class="img-acorr" >
                                        <img src="https://entrecolores.com/wp-content/uploads/2015/09/Librer%C3%ADa-a-medida-con-baldas-y-cubos-2.jpg" style="width: 50%;" alt="">
                                    <img src="https://entrecolores.com/wp-content/uploads/2015/09/Librer%C3%ADa-a-medida-con-baldas-y-cubos-2.jpg" style="width: 50%;" alt="">
                                    </div>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Accordion Item #2
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card-body">
                                    <h5 class="card-title">Puedes Acercarte a Nuestra Tienda</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    </div>
                                    <div class="img-acorr" >
                                        <img src="https://entrecolores.com/wp-content/uploads/2015/09/Librer%C3%ADa-a-medida-con-baldas-y-cubos-2.jpg" style="width: 50%;" alt="">
                                    <img src="https://entrecolores.com/wp-content/uploads/2015/09/Librer%C3%ADa-a-medida-con-baldas-y-cubos-2.jpg" style="width: 50%;" alt="">
                                    </div>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Accordion Item #3
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="card-body">
                                    <h5 class="card-title">Puedes Acercarte a Nuestra Tienda</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    </div>
                                    <div class="img-acorr" >
                                        <img src="https://entrecolores.com/wp-content/uploads/2015/09/Librer%C3%ADa-a-medida-con-baldas-y-cubos-2.jpg" style="width: 50%;" alt="">
                                    <img src="https://entrecolores.com/wp-content/uploads/2015/09/Librer%C3%ADa-a-medida-con-baldas-y-cubos-2.jpg" style="width: 50%;" alt="">
                                    </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.744965814867!2d-77.07299592562799!3d-11.992140840884698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105ce5a29911f47%3A0x141a569154d70914!2sJr.%20Manuel%20Gonzales%20Prada%20877%2C%20Los%20Olivos%2015301!5e0!3m2!1ses-419!2spe!4v1688440853316!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    
                    </div>
                </div>
                </div>
            </div>
    </div>

    

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>Redes Sociales</h4>
                
                <ul class="footer-social-icons">
                    <li><a href="#"><i class='bx bxl-facebook'></i>Facebook</a></li>
                    <li><a href="#"><i class='bx bxl-twitter'></i>Twitter</a></li>
                    <li><a href="#"><i class='bx bxl-instagram'></i>Instagram</a></li>
                    <li><a href="#"><i class='bx bxl-pinterest'></i>Pinterest</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Enlaces útiles</h4>
                <ul class="footer-links-page">
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Productos</a></li>
                    <li><a href="#">Regístrate</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Contacto</h4>
                <a href="https://goo.gl/maps/c6MxRNPB6t559iwv7" target="_blank" ><p class="footer-address"><i class='bx bx-map maps'></i> JR. Manuel Gonzales Prada 877, Los Olivos, Lima. </p></a>
                
                <p class="footer-email"><i class='bx bx-envelope'></i> info@shaddai.com</p>
                <p class="footer-phone"><i class='bx bx-phone '></i> +1234567890</p>
            </div>
        </div>
    </div>
</footer>

    <!-- JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

