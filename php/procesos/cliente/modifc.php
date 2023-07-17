<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cliente</title>
    <link rel="stylesheet" href="../../css/add.css">
</head>
<body>  
<?php 
    require 'modificliente.php';?>
<div class="contenedor">
    <form action="modificliente.php" name="modificar" method="GET">
        <h2 class="title">ID de Cliente a Modificar</h2>
        <input type="number" name="codcliente" required placeholder="Ingresa el ID" ><br>

        <h2>Datos a Modiicar</h2>
        
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
        <input type="password" name="clave" placeholder="Contraseña"><br>

        <h3>Tipo de Usuario</h3> <br>
        <input type="text" name="admin" placeholder="0 = Usuario / 1 = Admin" ><br><br>

        <div  class="btn" >
            <input type="submit" name="modificar"value="Modificar">
        </div>
    </form>
    </div> 
</body>
</html>