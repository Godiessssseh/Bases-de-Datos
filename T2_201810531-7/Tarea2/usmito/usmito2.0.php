<?php
/*
*Publica el usmito y lo guarda en la BD.
*/

include '../conexion.php';
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comentarios</title>
</head>
<body>

<center><form action="" method="POST">
        <textarea cols="80" rows="5" id="textarea" class="ta" name="mensaje" placeholder="Expresate, hasta 279 caracteres"></textarea>
        <br>
        <input type="submit" name="enviar" value="Comentar">
        <br>
        <a href="../index.php"> Volver al menu principal </a>
        <br>
        <a href="usmito2.0.php"> Refresh </a>
    </form></center>
<?php
if (isset($_POST['enviar'])) {
    $comentario = $_POST["mensaje"];
    if ($comentario == '') {
        echo 'Debes rellenar todos los campos.';
    } else {
        $query = "INSERT INTO usmito(usuario, publicacion) VALUES (?, ?);";
        $sql = mysqli_stmt_init($conexion);
        if (!mysqli_stmt_prepare($sql, $query)) {
            header("location: ../index.php?error=queryfailed");
            exit();
        }
        mysqli_stmt_bind_param($sql, "ss", $_SESSION['usuario'], $comentario);
        mysqli_stmt_execute($sql);
        mysqli_stmt_close($sql);
        header("location: ../index.php");
        exit();
    }
}
?>