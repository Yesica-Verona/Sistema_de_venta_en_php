<?php
include ('../app/config.php');
include ('../layout/session.php');
include ('../layout/parte1.php');
include('../app/controllers/proveedores/lista_proveedores.php');

if(isset ($_SESSION ['mensaje'])){
  $respuesta = $_SESSION ['mensaje'];
}
?>
<script>
   Swal.fire({
    position: "center",
    icon: "success",
    title: "<?php echo $respuesta; ?>",
    showConfirmButton: false,
    timer: 3000
   });
  </script>
<?php
unset($_SESSION ['mensaje']);
?>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css"> ...

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<!-- JSZip para exportar a Excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<!-- pdfmake para exportar a PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<!-- Botones para exportar -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>





<!-- titulo de bienvenida -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
            <h1 class="m-0">Lista de Proveedores</h1>
      </div>
    </div>
<!-- MODAl-->
    <div class="card-body">
      <button type="button" class="btn" style="background: #038510; color: white" data-toggle="modal" data-target="#modal-crear">
      <i class="fas fa-plus"></i>   Nuevo Proveedor
     </button>
    </div>

    <!--contenido-->
    <div class="content">
      <div class="container-fluid">
           <div class="row">
                <div class="col-12">
                   <div class="card card-outline card-success">
                       <div class="card-header">
                            <h3 class="card-title">Proveedores Registrados</h3>
                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                               </button>
                          </div>
                          <!-- /.card-tools -->
                       </div>
                      <div class="card-body">   
                          <table id="miTabla" class="table table-bordered table-hover table-responsive">               
                          <thead>
                              <tr>
                                  <th>N°</th>
                                  <th>Nombre del Proveedor</th>
                                  <th>Celular</th>
                                  <th>Telefono de empresa</th>
                                  <th>Nombre de la empresa</th>
                                  <th>Correo</th>
                                  <th>Dirección</th>
                                  <th>Acciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php 
                                $contador = 0;
                                foreach($tabla_proveedores as $tabla_proveedor){
                                  $id_proveedor = $tabla_proveedor['id_proveedor'];
                                  $nombre_proveedor = $tabla_proveedor ['nombre_proveedor'];
                              ?>
                               <tr>
                                  <td> <?php echo $contador = $contador + 1; ?></td>
                                  <td> <?php echo $tabla_proveedor['nombre_proveedor']; ?></td>
                                  <td> <a href="http://wa.me/57<?php echo $tabla_proveedor['celular']; ?>" class="btn btn-success btn-sm" target="_black"><i class="fas fa-phone" style="color: white"></i>
                                        <?php echo $tabla_proveedor['celular']; ?></a>
                                  </td>
                                  <td> <?php echo $tabla_proveedor['telefono_empresa']; ?></td>
                                  <td> <?php echo $tabla_proveedor['empresa']; ?></td>
                                  <td> <?php echo $tabla_proveedor['email']; ?></td>
                                  <td> <?php echo $tabla_proveedor['direccion']; ?></td>
                                  <td class="fixed">
                                   
                                      <div class="btn-group">
                                         <button type="button" class="btn btn-sm" style="background: #BC6608; color: white" data-toggle="modal" data-target="#modal-editar<?php echo $id_proveedor;?>">
                                            <i class="fas fa-pen"></i> Editar
                                          </button>
                                        <!--Modal para editar un proveedor-->
                                          <div class="modal fade" id="modal-editar<?php echo $id_proveedor;?>">
                                              <div class="modal-dialog modal-lg">
                                                 <div class="modal-content">
                                                    <div class="modal-header" style="background: #BC6608; color: white">
                                                       <h4 class="modal-title">Actualización del proveedor</h4>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                       </button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Nombre del Proveedor *</label>
                                                              <input type="text" id="nombre_proveedor<?php echo $id_proveedor;?>" class="form-control" value="<?php echo $tabla_proveedor['nombre_proveedor']; ?>">
                                                              <small style="color: red; display: none" id="requerido_nombre_proveedor<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                                           </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Celular *</label>
                                                              <input type="number" id="celular<?php echo $id_proveedor;?>" class="form-control" value="<?php echo $tabla_proveedor['celular']; ?>">
                                                              <small style="color: red; display: none" id="requerido_celular<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                                            </div>
                                                         </div>
                                                       </div>
                                                       <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Telefono de empresa</label>
                                                              <input type="number" id="telefono_empresa<?php echo $id_proveedor;?>" class="form-control" value="<?php echo $tabla_proveedor['telefono_empresa']; ?>">
                                                            </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Empresa *</label>
                                                              <input type="text" id="empresa<?php echo $id_proveedor;?>" class="form-control" value="<?php echo $tabla_proveedor['empresa']; ?>">
                                                              <small style="color: red; display: none" id="requerido_empresa<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                                           </div>
                                                         </div>
                                                       </div>
                                                       <div class="row">
                                                         <div class="col-md-6">
                                                           <div class="form-group">
                                                             <label for="">Correo electronico</label>
                                                             <input type="email" id="email<?php echo $id_proveedor;?>" class="form-control" value="<?php echo $tabla_proveedor['email']; ?>">
                                                           </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                           <div class="form-group">
                                                             <label for="">Dirección *</label>
                                                             <input type="text" id="direccion<?php echo $id_proveedor;?>" class="form-control" Value="<?php echo $tabla_proveedor['direccion']; ?>">
                                                             <small style="color: red; display: none" id="requerido_direccion<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                                           </div>
                                                          </div>
                                                       </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                       <button type="button" class="btn" style="background: #BC6608; color: white" id="btn_actualizar<?php echo $id_proveedor;?>">Actualizar</button>
                                                    </div>
                                                 </div>
                                               </div>
                                            </div>
                                            <script>
                                              $('#btn_actualizar<?php echo $id_proveedor;?>').click(function(){

                                                var id_proveedor = '<?php echo $id_proveedor;?>';
                                                var nombre_proveedor= $('#nombre_proveedor<?php echo $id_proveedor;?>').val();
                                                var celular = $('#celular<?php echo $id_proveedor;?>').val();
                                                var telefono_empresa = $('#telefono_empresa<?php echo $id_proveedor;?>').val();
                                                var empresa = $('#empresa<?php echo $id_proveedor;?>').val();
                                                var email = $('#email<?php echo $id_proveedor;?>').val();
                                                var direccion = $('#direccion<?php echo $id_proveedor;?>').val();                                                                                          

                                                  if(nombre_proveedor == ""){
                                                    $('#nombre_proveedor<?php echo $id_proveedor;?>').focus();
                                                    $('#requerido_nombre_proveedor<?php echo $id_proveedor;?>').css('display','block');
                                                  }else if(celular == ""){
                                                    $('#celular<?php echo $id_proveedor;?>').focus();
                                                    $('#requerido_celular<?php echo $id_proveedor;?>').css('display','block');  
                                                  }else if(empresa == ""){
                                                    $('#empresa<?php echo $id_proveedor;?>').focus();
                                                    $('#requerido_empresa<?php echo $id_proveedor;?>').css('display','block');
                                                  }else if(direccion == ""){
                                                    $('#direccion<?php echo $id_proveedor;?>').focus();
                                                    $('#requerido_direccion<?php echo $id_proveedor;?>').css('display','block'); 
                                                  }else{
                                                    var url = "../app/controllers/proveedores/actualizar_proveedor.php";
                                                    $.get(url, {id_proveedor: id_proveedor, nombre_proveedor: nombre_proveedor, celular: celular, telefono_empresa: telefono_empresa, empresa: empresa, email: email, direccion: direccion}, function(datos){
                                                      $('#respuesta_actualizar<?php echo $id_proveedor;?>').html(datos);
                                                    }); 
                                                  }
                                                } 
                                              );
                                            </script>
                                            <div id="respuesta_actualizar<?php echo $id_proveedor;?>"></div>
                                    
                                         <button type="button" class="btn btn-sm" style="background: #A83A1A; color: white" data-toggle="modal" data-target="#modal-eliminar<?php echo $id_proveedor;?>">
                                            <i class="fas fa-trash"></i> Eliminar
                                          </button>
                                        <!--Modal para eliminar un proveedor-->
                                          <div class="modal fade" id="modal-eliminar<?php echo $id_proveedor;?>">
                                              <div class="modal-dialog modal-lg">
                                                 <div class="modal-content">
                                                    <div class="modal-header" style="background: #A83A1A; color: white">
                                                       <h4 class="modal-title">Eliminar Proveedor</h4>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                       </button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Nombre del Proveedor *</label>
                                                              <input type="text" id="nombre_proveedor<?php echo $id_proveedor;?>" class="form-control" value="<?php echo $tabla_proveedor['nombre_proveedor']; ?>" disabled>
                                                              <small style="color: red; display: none" id="requerido_nombre_proveedor<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                                           </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Celular *</label>
                                                              <input type="number" id="celular<?php echo $id_proveedor;?>" class="form-control" value="<?php echo $tabla_proveedor['celular']; ?>" disabled >
                                                              <small style="color: red; display: none" id="requerido_celular<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                                            </div>
                                                         </div>
                                                       </div>
                                                       <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Telefono de empresa</label>
                                                              <input type="number" id="telefono_empresa<?php echo $id_proveedor;?>" class="form-control" value="<?php echo $tabla_proveedor['telefono_empresa']; ?>"disabled>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Empresa *</label>
                                                              <input type="text" id="empresa<?php echo $id_proveedor;?>" class="form-control" value="<?php echo $tabla_proveedor['empresa']; ?>"disabled>
                                                              <small style="color: red; display: none" id="requerido_empresa<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                                           </div>
                                                         </div>
                                                       </div>
                                                       <div class="row">
                                                         <div class="col-md-6">
                                                           <div class="form-group">
                                                             <label for="">Correo electronico</label>
                                                             <input type="email" id="email<?php echo $id_proveedor;?>" class="form-control" value="<?php echo $tabla_proveedor['email']; ?>"disabled>
                                                           </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                           <div class="form-group">
                                                             <label for="">Dirección *</label>
                                                             <input type="text" id="direccion<?php echo $id_proveedor;?>" class="form-control" Value="<?php echo $tabla_proveedor['direccion']; ?>"disabled>
                                                             <small style="color: red; display: none" id="requerido_direccion<?php echo $id_proveedor;?>">* Este campo es requerido</small>
                                                           </div>
                                                          </div>
                                                       </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                       <button type="button" class="btn" style="background: #A83A1A; color: white" id="btn_eliminar<?php echo $id_proveedor;?>">Eliminar</button>
                                                    </div>
                                                 </div>
                                               </div>
                                            </div>
                                            <script>
                                              $('#btn_eliminar<?php echo $id_proveedor;?>').click(function(){

                                                var id_proveedor = '<?php echo $id_proveedor;?>';                                                                                         
                           
                                                    var url2 = "../app/controllers/proveedores/eliminar_proveedor.php";
                                                    $.get(url2, {id_proveedor: id_proveedor}, function(datos){
                                                      $('#respuesta_eliminar<?php echo $id_proveedor;?>').html(datos);
                                                    }); 
                                                  }
                                                
                                              );
                                            </script>
                                            <div id="respuesta_eliminar<?php echo $id_proveedor;?>"></div>
                                    </div>


                                  </td>
                              </tr>
                              <?php
                              }
                              ?>
                          </tbody>
                          </table>
                     </div>
                 </div>
               </div>
          </div>
      </div>
    </div>
  </div>
<script>
    $(document).ready(function() {
        $('#miTabla').DataTable();
    });
    $('#miTabla').DataTable({
        paging: true,        // habilita paginación
        searching: true,     // habilita búsqueda
        order: [[0, 'asc']], // ordena por la columna en ascendentemente

        dom: 'Bfrtip',  
        buttons: [
            {
              extend: 'copy',
              text: 'Copiar'
            },
            {
              extend: 'collection',
              text: 'Exportar',
              buttons: [          
            {
             extend: 'excel',
             text: 'Excel'
            },
            {
             extend: 'pdf',
             text: 'PDF'
            }
            ]
            },
            {
              extend: 'print',
              text: 'Imprimir'
            }
          ],
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json' // para idioma español
        }

    });
</script>

<?php
include ('../layout/parte2.php');
?>
<!--Modal para nueva categoria-->
<div class="modal fade" id="modal-crear">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
          <div class="modal-header" style="background: #038510; color: white">
              <h4 class="modal-title">Creación de un nuevo Proveedor</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                           <label for="">Nombre del Proveedor *</label>
                           <input type="text" id="nombre_proveedor" class="form-control">
                           <small style="color: red; display: none" id="requerido_nombre_proveedor">* Este campo es requerido</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Celular *</label>
                          <input type="number" id="celular" class="form-control">
                          <small style="color: red; display: none" id="requerido_celular">* Este campo es requerido</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Telefono de empresa</label>
                          <input type="number" id="telefono_empresa" class="form-control">
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="">Empresa *</label>
                          <input type="text" id="empresa" class="form-control">
                          <small style="color: red; display: none" id="requerido_empresa">* Este campo es requerido</small>
                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                           <label for="">Correo electronico</label>
                           <input type="email" id="email" class="form-control">
                       </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                           <label for="">Dirección *</label>
                           <input type="text" id="direccion" class="form-control">
                           <small style="color: red; display: none" id="requerido_direccion">* Este campo es requerido</small>
                        </div>
                    </div>
                </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn" style="background: #038510; color: white" id="btn_guardar">Guardar</button>
          </div>
       </div>
    </div>
</div>
<script>
  //con Ajax
  $('#btn_guardar').click(function() {
  var nombre_proveedor = $('#nombre_proveedor').val();
  var celular = $('#celular').val();
  var telefono_empresa = $('#telefono_empresa').val();
  var empresa = $('#empresa').val();
  var email = $('#email').val();
  var direccion = $('#direccion').val();

  if(nombre_proveedor == ""){
    $('#nombre_proveedor').focus();
    $('#requerido_nombre_proveedor').css('display','block');
  }else if(celular == ""){
    $('#celular').focus();
    $('#requerido_celular').css('display','block');  
  }else if(empresa == ""){
    $('#empresa').focus();
    $('#requerido_empresa').css('display','block');
  }else if(direccion == ""){
    $('#direccion').focus();
    $('#requerido_direccion').css('display','block'); 
}else{
    var url = "../app/controllers/proveedores/crear_proveedor.php";
  $.get(url, {nombre_proveedor: nombre_proveedor, celular: celular, telefono_empresa: telefono_empresa, empresa: empresa, email: email, direccion: direccion}, function(datos){
  $('#respuesta').html(datos);
 });
}
});
</script>
<div id="respuesta"></div>

