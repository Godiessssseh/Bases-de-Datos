<?php
/*
*Se utiliza para registrar nuevxs usuarixs al sistema.
*/

    header('Content-Type: text/html; charset=utf-8');
    require_once '../Validacion/validacion.php';

    $usuario = isset($_POST["usuario"]) ? $_POST["usuario"]: NULL;
    $Nombre = isset($_POST["Nombre"]) ? $_POST["Nombre"]: NULL;
    $Contraseña = isset($_POST["Contraseña"]) ? $_POST["Contraseña"]: NULL;

    $errorU = '';$errorN = '';$errorC = '';

    $errores = array();
    if($_POST){
        if(!validaUsuario($usuario)){
            $errorU = 'Error al rellenar el campo usuario <br>';
        }
        if(!validaName($Nombre)){
            $errorN = 'Error al rellenar este campo Nombre <br>';
        }
        if(!validaPassword($Contraseña)){
            $errorC = 'Error al rellenar el campo Contraseña <br>';
        }
        include '../conexion.php';
        if ($errorU == ""&& $errorN == "" && $errorC == ""){
            $usuario = $_POST["usuario"];
            $Nombre = $_POST["Nombre"];
            $Contraseña = $_POST["Contraseña"];

            $insert = "INSERT INTO usmers(usuario, Nombre, Contraseña) VALUES('$usuario', '$Nombre', '$Contraseña')";
        
            $usuario_repetido = mysqli_query($conexion, "SELECT * FROM usmers WHERE usuario = '$usuario'");
            if(mysqli_num_rows($usuario_repetido) > 0){
                echo 'El usuario ya existe!\n';
            }

            $resultado = mysqli_query($conexion, $insert);

            if(!$resultado){
                echo('Registro fallido.');
            }
            else{
                echo('Usuario creado exitosamente.');
            }
            mysqli_close($conexion);
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Registrate!!!!</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/estilos.css">
    </head>
    <body>

    <h1><a href="registro.php">Registrar.</a></h1>

        <form action="registro.php" method = "POST">
            <input type="text" id = "usuario" name = "usuario" placeholder = "Ingrese su nombre de usuario.">
            <div> <?php  echo $errorU; ?></div>
            <input type="text" id = "Nombre" name = "Nombre" placeholder = "Ingrese su nombre.">
            <div> <?php  echo $errorN; ?></div>
            <input type="password" id = "Contraseña" name = "Contraseña" placeholder = "Ingrese su contraseña.">
            <div> <?php  echo $errorC; ?></div>
            <input type="submit" value = "Registrar">
            <br><br>
            <br>
            <br>
            <a href="../Main.php">Pagina principal.</a>
            <a href="../View/view_login.php"> Inicia sesión </a>
    </body>
</html>