<?php
    session_start();
    $id_user = $_SESSION['id'];
    require_once "fuincionesbd.php";

  //funcion para selecionar las empresas en lista
  if (isset($_GET['selecempre']))
    {
        $resp_selec_emp = selectempreUser();
        echo $resp_selec_emp;
    }

  //funcion para crear usuarios
  if (isset($_GET['createuser']))
    {
      $user     = $_POST['user'];
      $apellido = $_POST['apellido'];
      $id_tip_doc = $_POST['id_tip_doc'];
      $num_doc  = $_POST['num_doc'];
      $num_celu = $_POST['num_celu'];
      $correo   = $_POST['correo'];
      $Password = $_POST['password'];
      $id_business = $_POST['id_business'];
      $id_tip_user =$_POST['id_tip_user'];
      $respuesta= crate_user($user,$apellido,$id_tip_doc,$num_doc,$num_celu,$correo,$Password,$id_business,$id_tip_user);
      //$resp_selec_emp = selectempreUser();
        echo $respuesta;
    }

  //funcion de listar las empresas
  if (isset($_GET['listempre']))
    {
      $respuesta= selectfuntion($id_user);
      //echo $respuesta;
      if ($respuesta==1) {
        $resp_selec_emp = selectempre();
        echo $resp_selec_emp;
      }
      else {
        echo "usuario sin permisos";
      }
    }

  //funcion para crear el modulo de las preguntas
  if (isset($_GET['modulocrea']))
    {
      $name     = $_POST['name'];
      $descripcion = $_POST['descripcion'];
      $num_preguntas = $_POST['num_preguntas'];

      $resputfun = modulocreat($name,$descripcion,$num_preguntas);
      echo $resputfun;
    }

  //llamado a listar usuarios
  if (isset($_GET['listUser']))
    {
    $respuesta= selectfuntion($id_user);
    //echo $respuesta;
    if ($respuesta==1) {
      $resp_selec_emp = listUser();
      echo $resp_selec_emp;
    }
    else {
      echo "usuario sin permisos";
    }
  }



 ?>
