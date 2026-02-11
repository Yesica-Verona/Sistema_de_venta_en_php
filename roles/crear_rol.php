<?php
include ('../app/config.php');
include ('../layout/session.php');
include ('../layout/parte1.php');

?>
<!-- titulo de bienvenida -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
            <h1 class="m-0">Ingresar nuevo rol al Sistema PetsFriends</h1>
      </div>
    </div>
    <!--contenido-->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                     <div class="card">
                       <div class="card-header" style="background: #038510; color: white">
                            <h3 class="card-title">Verifique los datos antes de guardar</h3>
                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                               </button>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                                <form action="../app/controllers/roles/procesar_rol.php" method="POST">
                                    <div class="form-group">
                                        <label for="">Nombre del rol</label>
                                        <input type="text" name="rol" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn" style="background: #038510; color: white">Guardar</button>
                                    </div>
                                </form>
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
include ('../layout/mensaje.php');
include ('../layout/parte2.php');
?>