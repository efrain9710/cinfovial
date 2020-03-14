<?php
  require_once "../asset/header.php"
?>
<script type="text/javascript">
      $(document).ready(function(){
          $.ajax({
            url: "../../controladores/peticiones.php?selecempre=1",
            cache: false,
            success: function(data)
            {
                if(data)
                {
                  $('#empresaslist').html(data);
                }
            }
        });
      });

</script>

      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Usuario</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Usuarioss</li>
                  <li class="breadcrumb-item active"><a href="../../close.php">Close</a></li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header" style="background-color: #d3d00c;color:black">
                  <h3 class="card-title">Nueva Usuario</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formulario" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputText1">Nombre</label>
                      <input type="text" class="form-control" name="user" id="user" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputText1">Apellidos</label>
                      <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                      <label>Tipo de Documento</label>
                      <select class="form-control select2" name="id_tip_doc" id="id_tip_doc"style="width: 100%;">
                        <option selected="selected">Select</option>
                        <option value="1">C.C</option>
                        <option value="2">T.I</option>
                        <option value="3">PASAPORTE</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputNumber">Num Doc</label>
                      <input type="number" class="form-control" name="num_doc" id="num_doc" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputNumber">Celular</label>
                      <input type="number" class="form-control" name="num_celu" id="num_celu" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Correo</label>
                      <input type="email" class="form-control" name="correo" id="correo" placeholder="Enter ...">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                      <input type="hidden" name="tip_funct" id="tip_funct" value="create_user">
                    </div>
                    <div class="form-group" id="empresaslist">
                    </div>
                    <div class="form-group">
                      <label>Tipo de Usuario</label>
                      <select class="form-control select2" name="id_tip_user" id="id_tip_user" style="width: 100%;">
                        <option selected="selected">Select</option>
                        <option value="2">Administrador</option>
                        <option value="3">Estandar</option>
                      </select>
                    </div>
                  </div>

                  <!-- /.card-body -->

                  <div class="card-footer">
                    <input type="submit"  id="enviarusuario" value="Guardar" class="btn btn-info" style="color: #FFF;">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
      <script src="../../js/jquery-3.1.1.min.js"></script>
    	<script>
    			$(document).ready(function()
    			{
    				$('#enviarusuario').click(function()
    				{
              var  user =$("#user").val();
              var  apellido =$("#apellido").val();
              var  id_tip_doc  =$("#id_tip_doc").val();
              var  num_doc =$("#num_doc").val();
              var  num_celu =$("#num_celu").val();
              var  correo =$("#correo").val();
              var  password  =$("#password").val();
              var  id_business  =$("#id_business").val();
              var  id_tip_user =$("#id_tip_user").val();
    					var dataString = '&user='+user+'&apellido='+apellido+'&id_tip_doc='+id_tip_doc+'&num_doc='+num_doc+'&num_celu='+num_celu+'&correo='+correo+'&password='+password+'&id_business='+id_business+'&id_tip_user='+id_tip_user;
    					if($.trim(apellido).length>0 && $.trim(user).length>0)
    					{
    						$.ajax({
    						type: "POST",
    						url: "../../controladores/peticiones.php?createuser=1",
    						data: dataString,
    						cache: false,
    						success: function(data){
    						if(data)
    						{

                  if (data==1) {
                    alert("Datos guardados exitosamente");
                    location.reload(true);

                  }
    						}
    						else
    						{
    						//Shake animation effect.
    							$('#box').shake();
    							$("#login").val('Login')
    							$("#error").html("<span style='color:#cc0000'>Error:</span> Invalid username and password. ");
    						}
    					}
    				});
    			}
    			return false;
    		});
    	});
    </script>
<?php require_once "../asset/footer.php" ?>
