<?php
include ('../app/config.php');
include ('../layout/session.php');
include ('../layout/parte1.php');
include ('../app/controllers/usuarios/editar_usuario.php');
include('../app/controllers/roles/lista_roles.php');
?>
<!-- titulo de bienvenida -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
            <h1 class="m-0">Actualizar los datos de un usuario</h1>
      </div>
    </div>
    <!--contenido-->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                     <div class="card">
                       <div class="card-header" style="background: #BC6608; color: white">
                            <h3 class="card-title">Verifique los datos antes de actualizar </h3>
                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                               </button>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                                    <form action="../app/controllers/usuarios/actualizar.php" method="POST">
                                        <input type="text" name="id_usuario" value="<?php echo $id_usuario_get; ?>" hidden>
                                    <div class="form-group">
                                        <label for="">Nombres y Apellidos</label>
                                        <input type="text" name="nombres" class="form-control" value="<?php echo $nombres; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email </label>
                                        <input type="email" name="email"  class="form-control" value="<?php echo $email; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rol </label>
                                        <select name="rol" id="" class="form-control" >
                                            <?php
                                            foreach ($tabla_roles as $tabla_rol){
                                                $rol_tabla = $tabla_rol ['rol'];
                                                $id_rol = $tabla_rol ['id_rol']; ?>
                                            <option value="<?php echo $id_rol; ?>"
                                            <?php 
                                            if($rol_tabla == $rol){
                                            ?>
                                            selected ="selected"
                                            <?php
                                            }
                                            ?>
                                            > <?php echo $rol_tabla; ?> </option>
                                            <?php
                                            } 
                                            ?>                                           
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Contraseña </label>
                                        <input type="text" name="password_usuario"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirmar Contraseña </label>
                                        <input type="text" name="password_usuario_repeated"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn" style="background: #BC6608; color: white">Actualizar</button>
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