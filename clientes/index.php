<?php
include ('../app/config.php');
include ('../layout/session.php');
include ('../layout/parte1.php');
include('../app/controllers/clientes/lista_clientes.php');


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
            <h1 class="m-0">Lista de Clientes</h1>
      </div>
    </div>
<!-- MODAl-->
    <div class="card-body">
      <button type="button" class="btn" style="background: #038510; color: white" data-toggle="modal" data-target="#modal_crear_cliente">
      <i class="fas fa-plus"></i>   Nuevo Cliente
     </button>
    </div>

    <!--contenido-->
    <div class="content">
      <div class="container-fluid">
           <div class="row">
                <div class="col-md-8">
                   <div class="card card-outline card-success">
                       <div class="card-header">
                            <h3 class="card-title">Clientes Registrados</h3>
                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                               </button>
                          </div>
                          <!-- /.card-tools -->
                       </div>
                      <div class="card-body">   
                          <table id="miTabla" class="table table-bordered table-hover table-fluid">               
                          <thead>
                              <tr>
                                  <th>N°</th>
                                  <th>Nombre del Cliente</th>
                                  <th>Nit/CC</th>
                                  <th>Celular</th>
                                  <th>Correo electrónico</th>
                                  <th>Acciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php 
                                $contador_de_clientes = 0;
                                foreach($tabla_clientes as $tabla_cliente){
                                  $id_cliente = $tabla_cliente['id_cliente'];
                                  $nombre_cliente = $tabla_cliente ['nombre_cliente'];
                              ?>
                               <tr>
                                  <td> <?php echo $contador_de_clientes = $contador_de_clientes + 1; ?></td>
                                  <td> <?php echo $tabla_cliente['nombre_cliente']; ?></td>
                                  <td> <?php echo $tabla_cliente['nit_di_cliente']; ?></td>
                                  <td> <a href="http://wa.me/57<?php echo $tabla_cliente['celular_cliente']; ?>" class="btn btn-success btn-sm" target="_black"><i class="fas fa-phone" style="color: white"></i>
                                        <?php echo $tabla_cliente['celular_cliente']; ?></a>
                                  </td>
                                  <td> <?php echo $tabla_cliente['correo_cliente']; ?></td>
                                  <td class="fixed">
                                   
                                      <div class="btn-group">
                                         <button type="button" class="btn btn-sm" style="background: #BC6608; color: white" data-toggle="modal" data-target="#modal_editar_cliente<?php echo $id_cliente;?>">
                                            <i class="fas fa-pen"></i> Editar
                                          </button>
                                        <!--Modal para editar un cliente-->
                                          <div class="modal fade" id="modal_editar_cliente<?php echo $id_cliente;?>">
                                              <div class="modal-dialog modal-lg">
                                                 <div class="modal-content">
                                                    <div class="modal-header" style="background: #BC6608; color: white">
                                                       <h4 class="modal-title">Actualización del cliente</h4>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                       </button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Nombre del cliente *</label>
                                                              <input type="text" id="nombre_cliente<?php echo $id_cliente;?>" class="form-control" value="<?php echo $tabla_cliente['nombre_cliente']; ?>">
                                                              <small style="color: red; display: none" id="requerido_nombre_cliente<?php echo $id_cliente;?>">* Este campo es requerido</small>
                                                           </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Nit/CC *</label>
                                                              <input type="number" id="nit_di_cliente<?php echo $id_cliente;?>" class="form-control" value="<?php echo $tabla_cliente['nit_di_cliente']; ?>">
                                                              <small style="color: red; display: none" id="requerido_nit_di_cliente<?php echo $id_cliente;?>">* Este campo es requerido</small>
                                                            </div>
                                                         </div>
                                                       </div>
                                                       <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Celular *</label>
                                                              <input type="number" id="celular_cliente<?php echo $id_cliente;?>" class="form-control" value="<?php echo $tabla_cliente['celular_cliente']; ?>">
                                                              <small style="color: red; display: none" id="requerido_celular_cliente<?php echo $id_cliente;?>">* Este campo es requerido</small>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Correo electrónico *</label>
                                                              <input type="email" id="correo_cliente<?php echo $id_cliente;?>" class="form-control" value="<?php echo $tabla_cliente['correo_cliente']; ?>">
                                                              <small style="color: red; display: none" id="requerido_correo_cliente<?php echo $id_cliente;?>">* Este campo es requerido</small>
                                                           </div>
                                                         </div>
                                                       </div>
                                                    
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                       <button type="button" class="btn" style="background: #BC6608; color: white" id="btn_actualizar_cliente<?php echo $id_cliente;?>">Actualizar</button>
                                                    </div>
                                                 </div>
                                               </div>
                                            </div>
                                            <script>
                                              $('#btn_actualizar_cliente<?php echo $id_cliente;?>').click(function(){

                                                var id_cliente = '<?php echo $id_cliente;?>';
                                                var nombre_cliente= $('#nombre_cliente<?php echo $id_cliente;?>').val();
                                                var nit_di_cliente = $('#nit_di_cliente<?php echo $id_cliente;?>').val();
                                                var celular_cliente = $('#celular_cliente<?php echo $id_cliente;?>').val();
                                                var correo_cliente = $('#correo_cliente<?php echo $id_cliente;?>').val();                                                                                        

                                                  if(nombre_cliente == ""){
                                                    $('#nombre_cliente<?php echo $id_cliente;?>').focus();
                                                    $('#requerido_nombre_cliente<?php echo $id_cliente;?>').css('display','block');
                                                  }else if(nit_di_cliente == ""){
                                                    $('#nit_di_cliente<?php echo $id_cliente;?>').focus();
                                                    $('#requerido_nit_di_cliente<?php echo $id_cliente;?>').css('display','block');  
                                                  }else if(celular_cliente == ""){
                                                    $('#celular_cliente<?php echo $id_cliente;?>').focus();
                                                    $('#requerido_celular_cliente<?php echo $id_cliente;?>').css('display','block');  
                                                  }else if(correo_cliente == ""){
                                                    $('#correo_cliente<?php echo $id_cliente;?>').focus();
                                                    $('#requerido_correo_cliente<?php echo $id_cliente;?>').css('display','block'); 
                                                  }else{
                                                    var url = "../app/controllers/clientes/actualizar_cliente.php";
                                                    $.get(url, {id_cliente: id_cliente, nombre_cliente: nombre_cliente, nit_di_cliente: nit_di_cliente, celular_cliente: celular_cliente, correo_cliente: correo_cliente}, function(datos){
                                                      $('#respuesta_actualizar<?php echo $id_cliente;?>').html(datos);
                                                    }); 
                                                  }
                                                } 
                                              );
                                            </script>
                                            <div id="respuesta_actualizar<?php echo $id_cliente;?>"></div>
                                    
                                         <button type="button" class="btn btn-sm" style="background: #A83A1A; color: white" data-toggle="modal" data-target="#modal-eliminar<?php echo $id_cliente;?>">
                                            <i class="fas fa-trash"></i> Eliminar
                                          </button>
                                        <!--Modal para eliminar un proveedor-->
                                          <div class="modal fade" id="modal-eliminar<?php echo $id_cliente;?>">
                                              <div class="modal-dialog modal-lg">
                                                 <div class="modal-content">
                                                    <div class="modal-header" style="background: #A83A1A; color: white">
                                                       <h4 class="modal-title">Eliminar Cliente</h4>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                       </button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Nombre del Cliente *</label>
                                                              <input type="text" id="nombre_cliente<?php echo $id_cliente;?>" class="form-control" value="<?php echo $tabla_cliente['nombre_cliente']; ?>" disabled>
                                                              <small style="color: red; display: none" id="requerido_nombre_cliente<?php echo $id_cliente;?>">* Este campo es requerido</small>
                                                           </div>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Nit/CC *</label>
                                                              <input type="number" id="nit_di_cliente<?php echo $id_cliente;?>" class="form-control" value="<?php echo $tabla_cliente['nit_di_cliente']; ?>" disabled >
                                                              <small style="color: red; display: none" id="requerido_nit_di_cliente<?php echo $id_cliente;?>">* Este campo es requerido</small>
                                                            </div>
                                                         </div>
                                                       </div>
                                                       <div class="row">
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Celular *</label>
                                                              <input type="number" id="celular_cliente<?php echo $id_cliente;?>" class="form-control" value="<?php echo $tabla_cliente['celular_cliente']; ?>"disabled>
                                                              <small style="color: red; display: none" id="requerido_celular_cliente<?php echo $id_cliente;?>">* Este campo es requerido</small>
                                                            </div>
                                                          </div>
                                                          <div class="col-md-6">
                                                            <div class="form-group">
                                                              <label for="">Correo electrónico *</label>
                                                              <input type="email" id="correo_cliente<?php echo $id_cliente;?>" class="form-control" value="<?php echo $tabla_cliente['correo_cliente']; ?>"disabled>
                                                              <small style="color: red; display: none" id="requerido_correo_cliente<?php echo $id_cliente;?>">* Este campo es requerido</small>
                                                           </div>
                                                         </div>
                                                       </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                       <button type="button" class="btn" style="background: #A83A1A; color: white" id="btn_eliminar<?php echo $id_cliente;?>">Eliminar</button>
                                                    </div>
                                                 </div>
                                               </div>
                                            </div>
                                            <script>
                                              $('#btn_eliminar<?php echo $id_cliente;?>').click(function(){

                                                var id_cliente = '<?php echo $id_cliente;?>';                                                                                         
                           
                                                    var url2 = "../app/controllers/clientes/eliminar_cliente.php";
                                                    $.get(url2, {id_cliente: id_cliente}, function(datos){
                                                      $('#respuesta_eliminar<?php echo $id_cliente;?>').html(datos);
                                                    }); 
                                                  }
                                                
                                              );
                                            </script>
                                            <div id="respuesta_eliminar<?php echo $id_cliente;?>"></div>
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
<div class="modal fade" id="modal_crear_cliente">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">
          <div class="modal-header" style="background: #038510; color: white">
              <h4 class="modal-title">Crear un nuevo Cliente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                           <label for="">Nombre del Cliente *</label>
                           <input type="text" id="nombre_cliente" class="form-control">
                           <small style="color: red; display: none" id="requerido_nombre_cliente">* Este campo es requerido</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Nit/CC *</label>
                          <input type="number" id="nit_di_cliente" class="form-control">
                          <small style="color: red; display: none" id="requerido_nit_di_cliente">* Este campo es requerido</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Celular *</label>
                          <input type="number" id="celular_cliente" class="form-control">
                          <small style="color: red; display: none" id="requerido_celular_cliente">* Este campo es requerido</small>
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="">Correo Electrónico *</label>
                          <input type="email" id="correo_cliente" class="form-control">
                          <small style="color: red; display: none" id="requerido_correo_cliente">* Este campo es requerido</small>
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
  var nombre_cliente = $('#nombre_cliente').val();
  var nit_di_cliente = $('#nit_di_cliente').val();
  var celular_cliente = $('#celular_cliente').val();
  var correo_cliente = $('#correo_cliente').val();

  if(nombre_cliente == ""){
    $('#nombre_cliente').focus();
    $('#requerido_nombre_clienter').css('display','block');
  }else if(nit_di_cliente == ""){
    $('#nit_di_cliente').focus();
    $('#requerido_nit_di_cliente').css('display','block');  
  }else if(celular_cliente == ""){
    $('#celular_cliente').focus();
    $('#requerido_celular_cliente').css('display','block');
  }else if(correo_cliente == ""){
    $('#correo_cliente').focus();
    $('#requerido_correo_cliente').css('display','block'); 
}else{
    var url = "../app/controllers/clientes/crear_cliente.php";
    $.get(url, {nombre_cliente: nombre_cliente, nit_di_cliente: nit_di_cliente, celular_cliente: celular_cliente, correo_cliente: correo_cliente}, function(datos){
    $('#respuesta').html(datos);
    });
}
});
</script>
<div id="respuesta"></div>