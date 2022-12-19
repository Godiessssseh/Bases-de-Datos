<?php
/*
*Ayuda a conocer quien está conectado en la sesión.
*/

include('../conexion.php');
 
session_start();// Iniciando Sesion
// Guardando la sesion
$user_check=$_SESSION['usuario'];

// SQL Query para completar la informacion del usuario
$ses_sql=mysqli_query($conexion, "SELECT usuario from usmers where usuario='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['usuario'];

if(!isset($login_session)){
mysqli_close($conexion); // Cerrando la conexion
header('Location: ../index.php'); // Redirecciona a la pagina de inicio
}
?>