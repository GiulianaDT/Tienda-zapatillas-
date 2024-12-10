<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title> Registrarse </title>
</head>
<body>
    <div class="contenedor">
        <h1> REGISTRO </h1>
        <br>
        <form action="Registrarse.php" method="POST">

            <label for="">
                <i class="fa-solid fa-user"></i>
                    usuario
            </label>
            <input type="text" placeholder="Ingrese usuario" name="Usuario"> 
            <label for="">
                <i class="fa-solid fa-users"></i>
                 Nombre completo
            </label>
            <input type="text" placeholder="Ingrese nombre completo" name="Nombre_Completo">
            <label for="">
                 <i class="fa-solid fa-key"></i>
                clave
            </label>
            <input type="password" placeholder="ingrese clave" name="Clave">

            <input type="submit" class="button" value="Registrarse">

             <a href="Index.php" class="Boton_Ingresar">
            Ingresar
            </a>
        </form>
    </div>   
</body>
</html>