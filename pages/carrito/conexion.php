<?php

$host = 'localhost';
$dbname = 'shadday';
$user = 'root';
$pass = '';

// Crear una nueva conexión a la base de datos
$db = new mysqli($host, $user, $pass, $dbname);

// Verificar si la conexión fue exitosa
if ($db->connect_error) {
    die("Error al conectar con la base de datos: " . $db->connect_error);
}

?>