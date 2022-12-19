<?php
/*
*Este archivo elimina  todo el perfil de la tabla usmito, siendo necesario el usuario (PK). Eliminando todos su usmitos y lugares donde
* aparezca, cabe decir que no se actualizan los me encantas, seguidores, seguimientos etc
*/
  include '../conexion.php';
  session_start();
$id=$_SESSION['usuario'];
$query=mysqli_query($conexion,"SELECT * FROM usmers where usuario='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
  <h1>¿Quieres eliminar el perfil?</h1>
    <br>
    <br>
<div class="profile-input-field">
        <form method="post" action="#" >
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>
            <center>
                <a href="eliminar.perfil.php"> Refresh </a>
                <br><br>
             <a href="perfil.php">No eliminar</a> 
           </center>
          </div>
        </form>
      </div>
      </html>
      <?php
      if(isset($_POST['submit'])){
      $query = "DELETE FROM usmers where usuario='$id'";
                    $result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
                    ?>
                     <script type="text/javascript">
            alert("Delete Successfull.");
            window.location = "../Main.php";
        </script>
        <?php
             }               
?>