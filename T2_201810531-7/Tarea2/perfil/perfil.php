<?php
/*
*Esto solo muestra lo que hay en el perfil de cada usuario. Es único y personalizable.
*/


include('../Sesion/session.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Tu Perfil</title>
<!-- Custom Theme files -->
<link rel="stylesheet" href="../assets/css/estilos.css">
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
<h1>Tu Perfil</h1>
<div class="header agile">
	<div class="wrap">
		<div class="login-main wthree">
			<div class="login">
			<h3>Este es tu perfil,   <i><?php echo $login_session; ?></i></h3>
            <?php
            include('../conexion.php');
            $id=$_SESSION['usuario'];

            $query=mysqli_query($conexion,"SELECT * FROM usmers where usuario='$id'")or die(mysqli_error());
            $rows=mysqli_fetch_array($query);
             ?>
  <h1><a href="perfil.php">Perfil de <?php echo($_SESSION['usuario']);?></a></h1>
<div class="profile-input-field">
        <h3>Datos del perfil</h3>
        <form method="post" action="#" >
            <div class="form-group">
                <label>Usuario:</label>
                <br>
                <b><?php echo $rows['usuario']; ?></b>
                <br>
            </div>
          <div class="form-group">
            <label>Nombre:</label>
            <br>
            <b><?php echo $rows['Nombre'];?></b>
            <br>
          </div>
            <div class="form-group">
                <label>Seguidores:</label>
                <br>
                <b><?php echo $rows['Seguidores']; ?></b>
                <br>
            </div>
            <div class="form-group">
                <label>Seguidos:</label>
                <br>
                <b><?php echo $rows['Seguidos']; ?></b>
                <br>
            </div>
            <div class="form-group">
                <label>Cantidad de publicaciones:</label>
                <br>
                <b><?php echo $rows['CantidadPublicaciones']; ?></b>
                <br>
            </div>
            <center>
             <a href="../Sesion/logout.php">Cerrar sesion</a>
             <br>
             <a href="editar.perfil.php">Editar Nombre y Contraseña</a>
             <br>
             <a href="../index.php">Pagina principal</a>
             <br>
             <a href="eliminar.perfil.php">eliminar</a>
             <br>
        </center>
          </div>
        </form>
      </div>
		</div>
	</div>
</div>
</body>
</html>