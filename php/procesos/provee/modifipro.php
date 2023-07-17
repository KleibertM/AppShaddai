<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="../../css/add.css">
</head>
<body>  
<div class="contenedor">
    <form action="modifprovee.php" name="modificar" method="GET">
        <h2 class="title">ID de Proveedor</h2>
        
        <input type="number" name="idprovee" required=""><br>
        <h2>Datos a Modiicar</h2>
        
            <input type="number" id="ruc" name="ruc" placeholder="Ingresa RUC" ><br>

            <input type="text" id="nombre" name="nombre" placeholder="Nombre" ><br>

            <input type="number" id="telefon" name="telefon" placeholder="N. Telefono" ><br>

            <input type="text" id="direccion" name="direccion" placeholder="Direccion" ><br>

            <input type="email" id="correo" name="correo" placeholder="Correo Electronico" ><br>

            <div  class="btn">
                <input type="submit" name="modificarpro" value="Modificar">
            </div>
    </form>
    </div> 
</body>
</html>