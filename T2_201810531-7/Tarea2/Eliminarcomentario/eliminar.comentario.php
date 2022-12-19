<?php
/*
*Aqui se hace todo el proceso para eliminar el comentario, solamente que funciona con errores, ya que no elimina 1 solo comentario,
*elimina TODOS los comentarios que hizo ese usuario.
*/
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
  <title>IT SourceCode</title>
  <link rel="stylesheet" href="libs/css/bootstrap.min.css">
  <link rel="stylesheet" href="libs/style.css">
  </head>
  <?php
  include '../conexion.php';
  session_start();
$id=$_SESSION['usuario'];
$query=mysqli_query($conexion,"SELECT * FROM usmito where IDUsmito='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
  <h1>¿Quieres eliminar todos tus comentarios?</h1>
<div class="profile-input-field">
        <form method="post" action="#" >
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>
            <center>
             <a href="../index.php">No eliminar</a>
           </center>
          </div>
        </form>
      </div>
      </html>
      <?php
      if(isset($_POST['submit'])){
      $query = "DELETE FROM usmito where usuario='$id'";
                    $result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
                    ?>
                     <script type="text/javascript">
            alert("Delete Successfull.");
            window.location = "../index.php";
        </script>
        <?php
             }               
?>  