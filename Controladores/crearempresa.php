<?php

require_once "fuincionesbd.php";


    $nombre   = $_POST['nombre'];
    $nit      = $_POST['nit'];
    $user     = $_POST['user'];
    $apellido = $_POST['apellido'];
    $num_doc  = $_POST['num_doc'];
    $num_celu = $_POST['num_celu'];
    $correo   = $_POST['correo'];
    $Password = $_POST['password'];
    $function = $_POST['tip_funct'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $id_tip_doc = $_POST['id_tip_doc'];
    $respuesta= $function($nombre,$nit,$telefono,$direccion,$user,$apellido,$num_doc,$id_tip_doc,$num_celu,$correo,$Password);
    echo $respuesta;



?>
