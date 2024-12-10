<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "iniciosesiondb";

    // Conexión a la base de datos
    $conexion = mysqli_connect($host, $user, $pass, $db);

    // Verificar si la conexión fue exitosa
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
?>
