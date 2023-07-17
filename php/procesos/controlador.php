<?php
session_start();
// Incluir archivo de configuración de la base de datos
require_once 'conexion.php';

if (!empty($_POST['iniciar_sesion'])) {
    if (empty($_POST['user']) || empty($_POST['clave'])) {
        echo "<div class='alert alert_info'>Uno de los campos está vacío</div>";
    } else {
        // Consulta SQL con marcadores de posición
        $User = $_POST['user'];
        $Clave = $_POST['clave'];
        $stmt = $conexion->prepare("SELECT * FROM cliente WHERE user = :user");
        $stmt->execute(['user' => $User]);
        $datos = $stmt->fetch(PDO::FETCH_OBJ);
        
        if ($datos && password_verify($Clave, $datos->clave)) {
            $_SESSION['cliente'] = $datos;

            
            if ($datos->admin == 1) {
                session_start();
                $_SESSION['user'] = $User;
                header('Location: ../../pages/admin/admin.php');
            } else {
                session_start();
                $_SESSION['user'] = $User;
                header('Location: ../../pages/user/user.php');
            }
        } else {
            echo '<div class="alert alert_error">El correo electrónico o la contraseña son incorrectos</div>';
        }        
    }
}
/*require_once 'conexion.php';

if (!empty($_POST['iniciar_sesion'])) {
    if (empty($_POST['user']) || empty($_POST['clave'])) {
        echo "<div class='alert alert_info'>Uno de los campos está vacío</div>";
    } else {
        // Consulta SQL con marcadores de posición
        $User = $_POST['user'];
        $Clave = $_POST['clave'];
        $stmt = $conexion->prepare("SELECT * FROM cliente WHERE user = :user AND clave= :clave");
        $stmt->execute(['user' => $User, 'clave' => $Clave]);
        $datos = $stmt->fetch(PDO::FETCH_OBJ);
        
        if ($datos) {
            $_SESSION['cliente'] = $datos;
            if ($datos->admin == 1) {
                $_SESSION['user'] = $User;
                header('Location: ../html/admin.php');
            } else {
                session_start();
                $_SESSION['user'] = $User;
                header('Location: ../html/user.php');
            }
        } else {
            echo '<div class="alert alert_error">El correo electrónico o la contraseña son incorrectos</div>';
        }        
    }
}*/
?>