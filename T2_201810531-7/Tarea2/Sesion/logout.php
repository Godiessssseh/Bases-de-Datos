<?php
/*
*Te desloguea de la sesión.
*/


session_start();
if(session_destroy()) // Destruye todas las sesiones
{
header("Location:../Main.php"); // Redireccionando a la pagina index.php
}
?>
