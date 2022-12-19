<?php
/*
*Código HTML que muestra lo necesario para publicar un usmito. No tiene limite de palabras y debería tenerlo.
*/
?>
<!DOCTYPE html>
<html lang="es">
<div class="wrapper">
    <section class="usmitos">
        <div>
            <h1> <a href="usmear.php" > En qué estás pensando? </a> </h1>
            <form id="Formulario" action="usmear.php" method="post">
                <textarea class="ta" name="mensaje" placeholder="Expresate, hasta 279 caracteres"></textarea>
                <br><br>
                <button type="submit" name="Publicar">Publicar</button>
            </form>
        </div>
    </section>
    <a href="../index.php">Pagina principal.</a>
</div>
</html>