<?php
/*
* Este archivo tal como dice su nombre, es para editar el perfil, donde SÓLO se puede cambiar
* Nombre de Usuario y Contraseña (Tuve problemas al usar la PK y cambiar el nombre de usuario)
*/
?>

<!DOCTYPE html>
<html lang="es">
  <head>
  <title>IT SourceCode</title>
  <link rel="stylesheet" href="libs/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/estilos.css">
  </head>
  <?php
  include '../conexion.php';
  session_start();
$id=$_SESSION['usuario'];
$query=mysqli_query($conexion,"SELECT * FROM usmers where usuario='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
<body>
  <h1>Perfil de usuario</h1>
<div class="profile-input-field">
        <h3>Configura tu perfil</h3>
        <form method="post" action="#" >
          <div class="form-group">
            <label>Nuevo nombre</label>
            <input type="text" class="form-control" name="fname" style="width:20em;" placeholder="Ingrese su nombre" value="<?php echo $row['Nombre']; ?>" required />
          </div>
          <div class="form-group">
            <label>Nueva Contraseña</label>
            <input type="text" class="form-control" name="person" style="width:20em;" required placeholder="Ingrese su nueva contraseña" value="<?php echo $row['Contraseña']; ?>"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>
            <center>
                <a href="perfil.php">Volver atrás.</a>
                <br><br>
             <a href="../Sesion/logout.php">Cerrar sesion.</a>
                <br><br>
                <a href="editar.perfil.php"> Refresh </a>
           </center>
          </div>
        </form>
      </div>
    </body>
      </html>
      <?php
      if(isset($_POST['submit'])){
        $Nombrec = $_POST['fname'];
        $persona = $_POST['person'];
      $query = "UPDATE usmers SET Nombre = '$Nombrec',
                     Contraseña = '$persona'
                      WHERE usuario = '$id'";
                    $result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
                    ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "perfil.php";
        </script>
        <?php
             }               
?>  