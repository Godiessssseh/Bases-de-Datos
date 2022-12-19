<?php
/*
*Muestra visualmente el Login, para ingresar al sistema.
*/


include('../Sesion/login.php'); // Includes Login Script

if(isset($_SESSION['login_user_sys'])){
    header("location: ../perfil/perfil.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Inicio de Sesión</title>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- for-mobile-apps -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Signika:400,600' rel='stylesheet' type='text/css'>
    <!--google fonts-->
</head>
<body>
<!--header start here-->
<h1><a href="view_login.php">Iniciar Sesión</a></h1>
<div class="header agile">
    <div class="wrap">
        <div class="login-main wthree">
            <div class="login">
                <h3>Iniciar sesión</h3>
                <form action="#" method="post">
                    <input type="text" placeholder="Usuario" required="" name="username" required>
                    <input type="password" placeholder="Contraseña" name="password" required>
                    <input name="submit" type="submit" value="Ingresar">
                    <br>
                    <br>
                    <a href="../Sesion/registro.php">Registrate.</a>
                    <br>
                    <br>
                    <a href="../Main.php">Pagina principal.</a>
                </form>
                <div class="clear"> </div>
                <span><?php echo $error; ?></span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
