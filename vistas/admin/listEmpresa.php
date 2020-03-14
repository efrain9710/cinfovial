<?php
  require_once "../asset/header.php"
?>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header" style="background-color: #d3d00c;color:black">
            <h3 class="card-title">EMPRESAS</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <div id="div1"></div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!-- /.col -->
    </div>
<script type="text/javascript">
      $(document).ready(function(){
          $.ajax({
            url: "../../controladores/peticiones.php?listempre=1",
            cache: false,
            success: function(data)
            {
                if(data)
                {
                  $('#div1').html(data);
                }
            }
        });
      });

</script>

<?php require_once "../asset/footer.php" ?>
