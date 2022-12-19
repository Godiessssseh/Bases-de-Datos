<?php
/*
*Es para poder logearse dentro de USMwer, busca y compara el usuario con contraseña dentro de la tabla usmers, si hay
* equivalencias, lo deja entrar (Usuario único)
*/


session_start(); // Iniciando sesion
$error=''; // Variable para almacenar el mensaje de error
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
    $error = "User or Password is invalid";
    }
    else
    {
// Define $username y $password
        $username=$_POST['username'];
        echo($username);
        var_dump($username);
        $password=$_POST['password'];
// Estableciendo la conexion a la base de datos
        include('../conexion.php');
 
        $sql = "SELECT usuario, Contraseña FROM usmers WHERE usuario = '" . $username. "' and Contraseña='".$password."';";
        $query=mysqli_query($conexion,$sql);
        $counter=mysqli_num_rows($query);
        if ($counter==1){
		    $_SESSION['usuario']=$username; // Iniciando la sesion
		    header("location: ../index.php"); // Redireccionando a la pagina profile.php
        }else {
            $error = "El usuario o la contraseña es inválida.";
        }
    }
}
?>