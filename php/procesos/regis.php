<?php
        include 'conexion.php';

        /*if (!empty($_POST['regis'])) {
            if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['telefono']) || empty($_POST['dni']) || empty($_POST['direccion']) || empty($_POST['edad']) || empty($_POST['sexo']) || empty($_POST['correo']) || empty($_POST['user']) || empty($_POST['clave'])) {
                echo "<div class='alert alert_info'>Uno de los campos está vacío</div>";
            }elseif (strlen($_POST['dni']) != 8) {
                echo "<div class='alert alert_info'>El DNI debe tener 8 caracteres</div>";
                
            }elseif (strlen($_POST['clave']) < 8) {
                echo "<div class='alert alert_info'>La contraseña debe tener al menos 8 caracteres</div>";
            } else {
                $Nombre = $_POST['nombre'];
                $Apellido = $_POST['apellido'];
                $Telefono = $_POST['telefono'];
                $Dni = $_POST['dni'];
                $Direccion = $_POST['direccion'];
                $Edad = $_POST['edad'];
                $Sexo = $_POST['sexo'];
                $Correo = $_POST['correo'];
                $User = $_POST['user'];
                $Clave = $_POST['clave'];
               
            

                $stmt = $conexion->prepare("SELECT * FROM cliente WHERE dni = :dni");
                $stmt->bindParam(':dni', $Dni);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    echo '<div class="alert alert_error">El DNI ya está registrado</div>';
                } else {
                    $stmt = $conexion->prepare("SELECT * FROM cliente WHERE correo = :correo");
                    $stmt->bindParam(':correo', $Correo);
                    $stmt->execute();
                    if ($stmt->rowCount() > 0) {
                        echo '<div class="alert alert_error">El correo electrónico ya está registrado</div>';
                    } else {
                        $stmt = $conexion->prepare("INSERT INTO cliente (nombre,	apellido,	telefono,	dni,	direccion,	edad,	sexo,	correo,	user,	clave) VALUES (:nombre,	:apellido,	:telefono,	:dni,	:direccion,	:edad,	:sexo,	:correo,	:user,	:clave)");

                        $stmt->bindParam(':nombre', $Nombre);
                        $stmt->bindParam(':apellido', $Apellido);
                        $stmt->bindParam(':telefono', $Telefono);
                        $stmt->bindParam(':dni', $Dni);
                        $stmt->bindParam(':direccion', $Direccion);
                        $stmt->bindParam(':edad', $Edad);
                        $stmt->bindParam(':sexo', $Sexo);
                        $stmt->bindParam(':correo',$Correo);
                        $stmt->bindParam(':user', $User);
                        $stmt->bindParam(':clave', $Clave);      
                            
                        
                        if ($stmt->execute()) {

                            header('Location: login2.php');

                            echo '<div class="alert alert_exitosa">Usuario registrado correctamente</div>';
                        } else {
                            echo '<div class="alert alert_error">Error al registrar usuario</div>';
                        }
                    }
                }
            }
        }*/

if (!empty($_POST['regis'])) {
    if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['telefono']) || empty($_POST['dni']) || empty($_POST['direccion']) || empty($_POST['edad']) || empty($_POST['sexo']) || empty($_POST['correo']) || empty($_POST['user']) || empty($_POST['clave'])) {
        echo "<div class='alert alert_info'>Uno de los campos está vacío</div>";
    } elseif (strlen($_POST['dni']) != 8) {
        echo "<div class='alert alert_info'>El DNI debe tener 8 caracteres</div>";
    } elseif (strlen($_POST['clave']) < 8) {
        echo "<div class='alert alert_info'>La contraseña debe tener al menos 8 caracteres</div>";
    } else {
        $Nombre = $_POST['nombre'];
        $Apellido = $_POST['apellido'];
        $Telefono = $_POST['telefono'];
        $Dni = $_POST['dni'];
        $Direccion = $_POST['direccion'];
        $Edad = $_POST['edad'];
        $Sexo = $_POST['sexo'];
        $Correo = $_POST['correo'];
        $User = $_POST['user'];
        $Clave = $_POST['clave'];

        $stmt = $conexion->prepare("SELECT * FROM cliente WHERE dni = :dni");
        $stmt->bindParam(':dni', $Dni);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo '<div class="alert alert_error">El DNI ya está registrado</div>';
        } else {
            $stmt = $conexion->prepare("SELECT * FROM cliente WHERE correo = :correo");
            $stmt->bindParam(':correo', $Correo);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                echo '<div class="alert alert_error">El correo electrónico ya está registrado</div>';
            } else {
                $hashedPassword = password_hash($Clave, PASSWORD_DEFAULT);

                $stmt = $conexion->prepare("INSERT INTO cliente (nombre,	apellido,	telefono,	dni,	direccion,	edad,	sexo,	correo,	user,	clave) VALUES (:nombre,	:apellido,	:telefono,	:dni,	:direccion,	:edad,	:sexo,	:correo,	:user,	:clave)");

                $stmt->bindParam(':nombre', $Nombre);
                $stmt->bindParam(':apellido', $Apellido);
                $stmt->bindParam(':telefono', $Telefono);
                $stmt->bindParam(':dni', $Dni);
                $stmt->bindParam(':direccion', $Direccion);
                $stmt->bindParam(':edad', $Edad);
                $stmt->bindParam(':sexo', $Sexo);
                $stmt->bindParam(':correo', $Correo);
                $stmt->bindParam(':user', $User);
                $stmt->bindParam(':clave', $hashedPassword);

                if ($stmt->execute()) {
                    header('Location: login2.php');
                    echo '<div class="alert alert_exitosa">Usuario registrado correctamente</div>';
                } else {
                    echo '<div class="alert alert_error">Error al registrar usuario</div>';
                }
            }
        }
    }
}
?>
<!-- CSS de Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../../CSSs/style.css">

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<form action="regis.php" method="POST" >
    <div class="signup">
    <h3>Registrar Datos</h3>
		<div class="form-holder">
            <input type="text" class="input" name="nombre"required placeholder="Nombre">
            <input type="text" class="input" name="apellido"required placeholder="Apellido" >
            <input type="text" class="input"  name="telefono"required  placeholder="Telefono" >
            <input type="text" class="input" name="dni"required placeholder="DNI" >
            <input type="text" class="input" name="direccion"required placeholder="Direccion" >
            <input type="text" class="input" name="edad"required placeholder="Edad" >
                <select name="sexo" class="input" id="sexo"required aria-placeholder="Sexo" >
                    <option disabled selected value="">Seleccione un Sexo </option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select> 
            <input type="text" class="input" name="correo"required placeholder="Correo Electronico" >
            <input type="text" class="input" name="user"required placeholder="Nombre Usuario" >
            <input type="password" class="input" name="clave"required placeholder="Contraseña" >
		</div>
        <input type="submit" class="submit-btn btn btn-success" name="regis" value="Registrarse">
        <div class="link-redd" >
            <p>¿Ya tienes cuenta? <a href="login2.php">Ingresa Aqui</a></p>
        </div>
    </div>
    <div class="exit-btn" >
				<a href="../../index.php"><i class='bx bxs-exit'></i>inicio</a>
			</div>
    </form>