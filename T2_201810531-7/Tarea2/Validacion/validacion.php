<?php
/*
 * Función validaUsuario
 * Revisa que se escriba un nombre de usuario y que no sea vacío
 * Return booleano
*/
function validaUsuario($usuario){
    if ($usuario == '') {
        return false;
    } else {
        return true;
    }
}
/*
 * Función validaPassword
 * Revisa que se escriba una contraseña y no sea vacía
 * Return booleano
*/
 function validaPassword($Contraseña){
    if($Contraseña == ''){
       return false;
    }else{
       return true;
    }
 }
/*
* Función validaNombre
* Revisa que se escriba un nombre y no sea vacío
* Return booleano
*/
 function validaName($Nombre){
    if($Nombre == ''){
       return false;
    }else{
       return true;
    }
 }
