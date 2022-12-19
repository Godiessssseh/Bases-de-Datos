<?php
/*
* Crea la barra de Búsqueda, aunque no está implementada en el código, lo dejé para entender que hago mal.
*/
?>
<!DOCTYPE html>
<html lang="es">

</html>
<?php

if($_POST['buscar']){
    ?>
    <!-- el resultado de la búsqueda lo encapsularemos en un tabla -->
    <table width="100%" border="0" align="center" cellpadding="1" cellspacing="1">
        <tr>
            <!--creamos los títulos de nuestras dos columnas de nuestra tabla -->
            <td width="100" align="center"><strong>Nombre</strong></td>
            <td width="100" align="center"><strong>Tags</strong></td>
        </tr>
        <?php
        $consulta_mysql= mysqli_query ("SELECT * FROM usmers WHERE usuario like '%$buscar%' or SELECT * FROM tags like '%$buscar%'");
        while($registro = mysqli_fetch_assoc($consulta_mysql))
        {
            ?>
            <tr>
                <!--mostramos el nombre y apellido de las tuplas que han coincidido con la
                cadena insertada en nuestro formulario-->
                <td class="estilo-tabla" align="center"><?=$registro['usuario']?></td>
                <td class=”estilo-tabla” align="center"><?=$registro['Tag']?></td>
            </tr>
            <?php
        } //fin blucle
        ?>
    </table>
    <?php
} // fin if
?>