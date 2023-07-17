<?php
    include ("conexion.php");
    include ("controlador.php");
?>

<!-- CSS de Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<link rel="stylesheet" href="../../CSSs/style.css">

	<form action="login2.php" method="POST">
		<div class="login slide-up">
			<div class="center" id="center"  >
				<h3>Iniciar Sesión</h3>
				<div class="form-holder">
					<input type="text" class="input" name="user"  placeholder="Nombre Usuario" />
					<input type="password" class="input" name="clave" placeholder="Contraseña" />
				</div>
				<input class="btn btn-success" type="submit" name="iniciar_sesion" value="Iniciar sesión">
			</div>
			<div class="link-redd">
					<p>¿No tienes cuenta? <a href="regis.php">Registrate Aqui</a></p>
			</div>
			
		</div>
		<div class="exit-btn" >
				<a href="../../index.php"><i class='bx bxs-exit'></i>inicio</a>
			</div>
    </form>