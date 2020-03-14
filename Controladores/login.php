<?php

require_once "fuincionesbd.php";



$usuario = $_POST['username'];
$contra  = $_POST['password'];
$function = $_POST['tip_funct'];
$respuesta= $function($usuario,$contra);
echo $respuesta;

?>
