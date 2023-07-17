<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user'])) {
	header("Location: ../../index.php");
	exit();
}



require '../../php/procesos/conexion.php';

$userId = $_SESSION['user'];
$stmt = $conexion->prepare("SELECT * FROM cliente WHERE user = :user");

// Asignar el valor del ID de usuario a un parámetro
$stmt->bindParam(':user', $userId);

// Ejecutar la consulta
$stmt->execute();

// Obtener los datos del usuario como un arreglo asociativo
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Venta de Biblias - SHADDAI. Explora nuestra amplia selección de Biblias y encuentra la que mejor se adapte a tus necesidades espirituales.">
    <meta name="keywords" content="Venta de Biblias, SHADDAI, Biblias de estudio, Biblia devocional, Biblia infantil, Comprar Biblias, Fe y espiritualidad, Palabra de Dios, Guía espiritual, Lectura de la Biblia, Reflexiones espirituales">

    <title>Perfil</title>

    
    <link rel="stylesheet" href="../../CSSs/nav.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>    

</head>
<body>

    <header class="box-header" >
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" style="position: relative; margin-bottom: 10px ;">
            <div class="container">
                <a class="navbar-brand" id="logo" href="user.php">Shaddai</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="user.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../carrito/VerCarta.php">Carrito</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../carrito/VerCarta.php">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../categoria/all2.php">Catalogo</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cuenta
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item btn-cerrar" href="../../php/procesos/cerrar.php">Cerrar Seccion</a></li>
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
    </header> 


    <main class="containe-fluid phofile d-flex "  >
        <div class="box-perfil flex-fill" style="width: 30%;">
            <section class="perfil " >
                <div class="card" style="width: 80%; margin: 10px; padding: 15px;">
                    <img src="https://cdn-icons-png.flaticon.com/512/3435/3435948.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Hola <?php echo $usuario['nombre']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">APELLIDO: <?php echo $usuario['apellido']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-body-secondary">MOVIL: <?php echo $usuario['telefono']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-body-secondary">DNI: <?php echo $usuario['dni']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-body-secondary">EDAD: <?php echo $usuario['edad']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-body-secondary">SEXO: <?php echo $usuario['sexo']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-body-secondary">DIRECCION: <?php echo $usuario['direccion']; ?></h6>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Correo: <?php echo $usuario['correo']; ?></h6>
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Editar Datos
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Datos a Editar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../../php/procesos/cliente/modificliente.php" name="modificar" method="GET">
                                
                                <input type="text" name="nombre" placeholder="Nombre" ><br>
                                <input type="text" name="apellido" placeholder="Apellido" ><br>
                                <input type="text" name="telefono" placeholder="Numero de Telefono" ><br>
                                <input type="text" name="dni" placeholder="DNI" ><br>
                                <input type="text" name="direccion" placeholder="Direccion" ><br>
                                <input type="text" name="edad" placeholder="Edad" ><br>
                                <select name="sexo" id="sexo">
                                    <option disabled selected value="">Seleccione un Sexo</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select> <br>
                                <input type="text" name="correo" placeholder="Correo" ><br>
                                <input type="text" name="user" placeholder="Nombre de Usuario" ><br>

                                <div class="modal-footer" >
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" name="modificar" class="btn btn-success"> editar</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
        </div>

        <div  class="flex-fill" style="width: 70%;">
            <section>
                <div >
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div>
                                <div class="card" style="width: 18rem;">
                                    <img src="..." class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">An item</li>
                                        <li class="list-group-item">A second item</li>
                                        <li class="list-group-item">A third item</li>
                                    </ul>
                                    <div class="card-body">
                                        <a href="#" class="card-link">Card link</a>
                                        <a href="#" class="card-link">Another link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</body>
</html>
