<?php
include ('../app/config.php');
include ('../layout/session.php');
include ('../layout/parte1.php');
include('../app/controllers/roles/lista_roles.php');


?>


<!-- titulo de bienvenida -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
            <h1 class="m-0">Ingresar usuario al Sistema PetsFriends</h1>
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
                                <form action="../app/controllers/usuarios/procesar_registro_usuario.php" method="POST">
                                    <div class="form-group">
                                        <label for="">Nombres y Apellidos</label>
                                        <input type="text" name="nombres" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email </label>
                                        <input type="email" name="email"  class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rol </label>
                                        <select name="rol" id="" class="form-control">
                                            <?php
                                            foreach($tabla_roles as $tabla_rol){ ?>
                                            <option value="<?php echo $tabla_rol['id_rol'];?>"> <?php echo $tabla_rol['rol'];?> </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Contraseña </label>
                                        <input type="text" name="password_usuario"  class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirmar Contraseña </label>
                                        <input type="text" name="password_usuario_repeated"  class="form-control" required>
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