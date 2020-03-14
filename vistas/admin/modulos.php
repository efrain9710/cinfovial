<?php
  require_once "../asset/header.php"
?>


      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Modulos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Modulo</li>
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
                  <h3 class="card-title" >Nueva Modulo</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" id="formulario" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputText1">Nombre Modulo</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter ...">
                    </div>
                    <div class="form-group">
                      <label>Descripción</label>
                      <textarea class="form-control" rows="3" name="descripcion" id="descripcion" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputNumber">Numero de preguntas</label>
                      <input type="number" class="form-control" name="num_preguntas" id="num_preguntas" placeholder="Enter ...">
                    </div>
                  </div>

                  <!-- /.card-body -->

                  <div class="card-footer">
                    <input type="submit"  id="enviarodulo" value="Continuar" class="btn btn-info" style="color: #FFF;">
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
    				$('#enviarodulo').click(function()
    				{
              var  name =$("#name").val();
              var  descripcion =$("#descripcion").val();
              var  num_preguntas  =$("#num_preguntas").val();
    					var dataString = '&name='+name+'&descripcion='+descripcion+'&num_preguntas='+num_preguntas;
    					if($.trim(name).length>0 && $.trim(descripcion).length>0)
    					{
    						$.ajax({
    						type: "POST",
    						url: "../../controladores/peticiones.php?modulocrea=1",
    						data: dataString,
    						cache: false,
    						success: function(data){
    						if(data)
    						{

                  if (data==1) {
                    alert("Datos guardados exitosamente");
                    window.location.href = "preguntas.php";

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
