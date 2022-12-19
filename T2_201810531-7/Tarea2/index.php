<?php
/*
*Menu principal del USMwer, aquí es donde se verán los usmitos,
*/
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

    <h1><a href="index.php">USMwer.</a></h1>

    <a action="registro.php" method = "POST"> </a>
        <div class="row">
            <div class="main"><!-- Seccion central-->
                <h1>Bienvenid@!</h1>
            </div>
        </div>
        <div class="iconosDerecho">
            <?php
            session_start();
            if (!isset($_SESSION['usuario'])) {
                $_SESSION['usuario']=NULL;?>
                <a href="View/view_login.php">Iniciar Sesión</a> <a href="Sesion/registro.php"> Registrar</a>
            <?php }else{?>
                <?php
                include('conexion.php');
                $id=$_SESSION['usuario'];
                ?>
                <h2> Usuario conectado:  <i><?php echo $_SESSION['usuario']; ?></i> </h2>
                <a href="Sesion/logout.php">Cerrar sesion</a>
                <br><br><br>
                <form method="POST" action="" onSubmit="return validarForm(this)">
                    <input type="text" placeholder="Buscar tag o usuario" name="palabra">
                    <input type="submit" value="Buscar" name="buscar">
                </form>
                <br><br>
                <a href="perfil/perfil.php">Mi Perfil.</a>
                <a href="usmito/usmito2.0.php"> Escribir usmito. </a>
            <?php }

            $sqlQueryComentarios  = ("SELECT * FROM usmito");
            $resultComentarios    = mysqli_query($conexion, $sqlQueryComentarios);
            $total_registro       = mysqli_num_rows($resultComentarios);

            $QueryComentarios      = ("SELECT * FROM usmito ORDER BY IDUsmito DESC LIMIT 100");
            $resultadoComentarios  = mysqli_query($conexion, $QueryComentarios);
            ?>

            <input type="hidden" name="total_registro" id="total_registro" value="<?php echo $total_registro; ?>" />

            <?php
            while ($dataComentarios = mysqli_fetch_assoc($resultadoComentarios)) { ?>
            <div class="col-md-10 text-center marb-35"</div>
        <div class="contenidouser">
            <h4><?php echo $dataComentarios['usuario'];?></h4>
            <p><?php echo $dataComentarios['publicacion'];?></p>

        </div>
        </div>
        <?php } ?>
        </div>
    <br><br>
    <br>
    <br>
        <a href="Main.php">Pagina principal.</a>
        <a href="Eliminarcomentario/eliminar.comentario.php"> Delete all </a>
    </body>
</html>
