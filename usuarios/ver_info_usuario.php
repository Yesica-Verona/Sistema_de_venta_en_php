<?php
include ('../app/config.php');
include ('../layout/session.php');
include ('../layout/parte1.php');
include ('../app/controllers/usuarios/ver_usuario.php');

?>
<!-- titulo de bienvenida -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
            <h1 class="m-0">Estas revisando los datos de un usuario</h1>
      </div>
    </div>
    <!--contenido-->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                     <div class="card ">
                       <div class="card-header" style="background: #1560EA; color: white">
                            <h3 class="card-title">No puedes editar</h3>
                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                               </button>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Nombres y Apellidos</label>
                                        <input type="text" name="nombres" class="form-control" value="<?php echo $nombres; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email </label>
                                        <input type="email" name="email"  class="form-control" value="<?php echo $email; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rol </label>
                                        <input type="text" name="rol"  class="form-control" value="<?php echo $rol; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-secondary">Volver</a>
                                    </div>
                            </div>
                          </div>  
                     </div>
                 </div>
                </div>
            </div>
        </div>   
    </div>
</div>
<?php
include ('../layout/parte2.php');
?>