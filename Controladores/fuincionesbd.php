<?php

  //llamo los datos de conexion con base de datos
  require_once "configApp.php";
  // Create connection
  $conn = new mysqli(SERVER, USER, PASSWORD, DB);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  //Funcion buscar usuario
    function login_user($correo,$password)
      {
          $conn = new mysqli(SERVER, USER, PASSWORD, DB);
          $sql = "SELECT * FROM tb_user WHERE correo='".$correo."';";
          $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
              // output data of each row
                while($row = $result->fetch_assoc())
                {
                    $passwordbs = $row["password"];
                    if ($passwordbs==$password) {
                      $user = $row["nombre"];
                      $id= $row["id_user"];
                      $id_tip_user = $row["id_tip_user"];
                      $id_empresa = $row["id_business"];
                      $apellidos = $row["apellidos"];
                        if ($id_tip_user=="1") {
                          session_start();
                          $_SESSION['user']  = $user;
                          $_SESSION['id']  = $id;
                          $_SESSION['apellidos']  = $apellidos;
                          $resp="http://localhost/cinfovial/vistas/admin";
                          return $resp;
                        }
                    }
                    else {
                      echo"el usuarios no existe";
                    }
                }
            }
            else
            {
              echo "0 results";
            }
      }
  //termina funcion

  //funcion crear usuario admin de compañia y crear compañia
    function create_empresa($nombre,$nit,$telefono,$direccion,$user,$apellido,$num_doc,$id_tip_doc,$num_celu,$correo,$Password)
      {
          $conn = new mysqli(SERVER, USER, PASSWORD, DB);
          $sql = "INSERT INTO tb_business(id_business, nombre, nit, telefono, direccion) VALUES (null,'".$nombre."','".$nit."','".$telefono."','".$direccion."');";
          if ($conn->query($sql) === TRUE) {

              $sql = "SELECT id_business FROM tb_business WHERE nit='".$nit."';";
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc())
              {
                  if ($result->num_rows > 0)
                  {
                    $id_business = $row["id_business"];
                  }
                }
                $sqluser = "INSERT INTO tb_user(id_user, nombre, apellidos, id_tip_doc, num_doc, correo, celular, password, id_tip_user, id_business, date_create)
                VALUES (null,'".$user."','".$apellido."','".$id_tip_doc."','".$num_doc."','".$correo."','".$num_celu."','".$Password."','2','".$id_business."', now())";
                //echo $sqluser;
                if ($conn->query($sqluser) === TRUE) {
                    $repues = "1";
                }
                else{
                    $repues = "Error: " . $sql . "<br>" . $conn->error;
                }
          }
          else{
              $repues = "Error: " . $sql . "<br>" . $conn->error;
          }
          return $repues;

      }
  //termina funcion

  //funcion llamar permisos usuario
    function selectfuntion($id_user)
      {
          $conn = new mysqli(SERVER, USER, PASSWORD, DB);
          $sql = "SELECT * FROM tb_user WHERE id_user='".$id_user."';";
          $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
              // output data of each row
                while($row = $result->fetch_assoc())
                {
                  $id_tip_user = $row['id_tip_user'];
                }
                return $id_tip_user;
            }
      }
  //termina function

  //Funcion llamar las Empresas
    function  selectempre()
      {
        $conn = new mysqli(SERVER, USER, PASSWORD, DB);
        $sql = "SELECT * FROM tb_business";
        $result = $conn->query($sql);
          if ($result->num_rows > 0)
          {
            $table = "";
              $table .="<table id='example2' class='table table-bordered table-hover'>";
                $table .="<thead>";
                  $table .="<tr>";
                    $table .="<th>ID EMPRESA</th>";
                    $table .="<th>NOMBRE</th>";
                    $table .="<th>NIT</th>";
                    $table .="<th>TELEFONO</th>";
                    $table .="<th>DIRECCIÓN</th>";
                    $table .="<th>OPCIONES</th>";
                  $table .="</tr>";
                $table .="</thead>";
            // output data of each row
              while($row = $result->fetch_assoc())
              {
                $table .="<thead>";
                  $table .= "<tr>";
                      $table .= "<td>".$row['id_business']."</td>";
                      $table .= "<td>".$row['nombre']."</td>";
                      $table .= "<td>".$row['nit']."</td>";
                      $table .= "<td>".$row['telefono']."</td>";
                      $table .= "<td>".$row['direccion']."</td>";
                      $table .= "<td><a href=''><i class='nav-icon fas fa-edit' style='color:#239200;'></i></a> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;";
                      $table .= "<a href=''><i class='nav-icon fas fa-trash-alt' style='color:red;'></i></a> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;";
                      $table .= "<a href=''><i class='nav-icon fas fa-info-circle' style='color:blue;'></i></td>";
                    $table .= "</tr>";
                  $table .="</thead>";
              }
              $table .="</table>";
              return $table;

          }
        }
  //termina funcion

  //funcion llamar en lista EMPRESAS
    function  selectempreUser()
      {
        $conn = new mysqli(SERVER, USER, PASSWORD, DB);
        $sql = "SELECT * FROM tb_business";
        $result = $conn->query($sql);
          if ($result->num_rows > 0)
          {
            $select = "<label>Empresa</label>";
              $select .= "<select class='form-control select2' name='id_business' id='id_business' style='width: 100%;'>";
                  $select .= "<option selected='selected'>Select</option>";
            // output data of each row
              while($row = $result->fetch_assoc())
              {
                  $select .= "<option value=".$row['id_business'].">".$row['nombre']."</option>";
              }
              $select .="</select>";
              return $select;

          }

      }
  //termina funcion


  //funcion crear usuarios
    function crate_user($user,$apellido,$id_tip_doc,$num_doc,$num_celu,$correo,$Password,$id_business,$id_tip_user)
      {
        $conn = new mysqli(SERVER, USER, PASSWORD, DB);
        $sqluser = "INSERT INTO tb_user(id_user, nombre, apellidos, id_tip_doc, num_doc, correo, celular, password, id_tip_user, id_business, date_create)
        VALUES (null,'".$user."','".$apellido."','".$id_tip_doc."','".$num_doc."','".$correo."','".$num_celu."','".$Password."','".$id_tip_user."','".$id_business."', now())";
        //echo $sqluser;
          if ($conn->query($sqluser) === TRUE) {
              $repues = "1";
          }
          else{
              $repues = "Error: " . $sqluser . "<br>" . $conn->error;
          }
          return $repues;
      }
  //termina funcion

  //funcion lista Usuarios
    function listUser()
      {
      $conn = new mysqli(SERVER, USER, PASSWORD, DB);
      $sql = "SELECT id_user, tb_user.nombre, apellidos, tb_tip_doc.tip_doc AS tip_doc,num_doc, correo,
              celular, password, tb_tip_user.nombre AS tip_user, tb_business.nombre AS nombreempresa, date_create
              FROM tb_user
              INNER JOIN tb_tip_doc ON tb_user.id_tip_doc=tb_tip_doc.id_tip_doc
              INNER JOIN tb_tip_user ON tb_user.id_tip_user=tb_tip_user.id_tip_user
              INNER JOIN tb_business ON tb_user.id_business=tb_business.id_business ";
      $result = $conn->query($sql);
        if ($result->num_rows > 0)
        {
          $table = "";
            $table .="<table id='example2' class='table table-bordered table-hover'>";
              $table .="<thead>";
                $table .="<tr>";
                  $table .="<th>ID</th>";
                  $table .="<th>NOMBRE</th>";
                  $table .="<th>APELLIDOS</th>";
                  $table .="<th>TIP DOC</th>";
                  $table .="<th>DOCUMENTO</th>";
                  $table .="<th>CORREO</th>";
                  $table .="<th>CELULAR</th>";
                  $table .="<th>TIP USUARIO</th>";
                  $table .="<th>EMPRESA</th>";
                  $table .="<th>CREACION</th>";
                  $table .="<th>OPCIONES</th>";
                $table .="</tr>";
              $table .="</thead>";
          // output data of each row
            while($row = $result->fetch_assoc())
            {
              $table .="<thead>";
                $table .= "<tr>";
                    $table .= "<td>".$row['id_user']."</td>";
                    $table .= "<td>".$row['nombre']."</td>";
                    $table .= "<td>".$row['apellidos']."</td>";
                    $table .= "<td>".$row['tip_doc']."</td>";
                    $table .= "<td>".$row['num_doc']."</td>";
                    $table .= "<td>".$row['correo']."</td>";
                    $table .= "<td>".$row['celular']."</td>";
                    $table .= "<td>".$row['tip_user']."</td>";
                    $table .= "<td>".$row['nombreempresa']."</td>";
                    $table .= "<td>".$row['date_create']."</td>";
                    $table .= "<td><a href=''><i class='nav-icon fas fa-edit' style='color:#239200;'></i></a> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;";
                    $table .= "<a href=''><i class='nav-icon fas fa-trash-alt' style='color:red;'></i></a> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;";
                    $table .= "<a href=''><i class='nav-icon fas fa-info-circle' style='color:blue;'></i></td>";
                  $table .= "</tr>";
                $table .="</thead>";
            }
            $table .="</table>";
            return $table;

        }

    }
  //termina la funcion

  //funcion de modulos create
  function modulocreat($name,$descripcion,$num_preguntas)
    {
      $conn = new mysqli(SERVER, USER, PASSWORD, DB);
      $sqluser = "INSERT INTO tb_modulos(id_modulo, nombre_modulo,descripcion, cant_preguntas) VALUES (null,'".$name."','".$descripcion."','".$num_preguntas."')";
      //echo $sqluser;
        if ($conn->query($sqluser) === TRUE) {
            $repues = "1";
        }
        else{
            $repues = "Error: " . $sqluser . "<br>" . $conn->error;
        }
        return $repues;

    }

$conn->close();
?>
