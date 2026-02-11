<?php
include ('../app/config.php');
include ('../layout/session.php');
include ('../layout/parte1.php');
include('../app/controllers/categorias/lista_categorias.php');

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
            <h1 class="m-0">Lista de Categorias</h1>
      </div>
    </div>
<!-- MODAl-->
    <div class="card-body">
      <button type="button" class="btn" style="background: #038510; color: white" data-toggle="modal" data-target="#modal-crear">
      <i class="fas fa-plus"></i>   Nueva Categoria
     </button>
    </div>

    <!--contenido-->
    <div class="content">
      <div class="container-fluid">
           <div class="row">
                <div class="col-10">
                   <div class="card card-outline card-success">
                       <div class="card-header">
                            <h3 class="card-title">Categorias Registradas</h3>
                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                               </button>
                          </div>
                          <!-- /.card-tools -->
                       </div>
                      <div class="card-body">   
                          <table id="miTabla" class="table table-bordered table-hover">               
                          <thead>
                              <tr>
                                  <th>N°</th>
                                  <th>Nombre de la Categoria</th>
                                  <th>Acciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php 
                                $contador = 0;
                                foreach($tabla_categorias as $tabla_categoria){
                                  $id_categoria = $tabla_categoria['id_categoria'];
                                  $nombre_categoria = $tabla_categoria ['nombre_categoria'];
                              ?>
                               <tr>
                                  <td> <?php echo $contador = $contador + 1; ?></td>
                                  <td> <?php echo $tabla_categoria['nombre_categoria']; ?></td>
                                  <td class="fixed">
                                    <center>
                                      <div class="btn-group">
                                         <button type="button" class="btn" style="background: #BC6608; color: white" data-toggle="modal" data-target="#modal-editar<?php echo $id_categoria;?>"><i class="fas fa-pen"></i> Editar
                                          </button>
                                        <!--Modal para editar una categoria-->
                                          <div class="modal fade" id="modal-editar<?php echo $id_categoria;?>">
                                              <div class="modal-dialog">
                                                 <div class="modal-content">
                                                    <div class="modal-header" style="background: #BC6608; color: white">
                                                       <h4 class="modal-title">Actualización de la categoria</h4>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                       </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                           <div class="col col-md-12">
                                                               <div class="form-group">
                                                                  <label for="">Nombre de la Categoria</label>
                                                                 <input type="text" id="nombre_categoria<?php echo $id_categoria;?>" class="form-control" value=<?php echo $nombre_categoria; ?>>
                                                                 <small style="color: red; display: none" id="requerido_actualizar<?php echo $id_categoria;?>">* Este campo es requerido</small>
                                                               </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                       <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                       <button type="button" class="btn" style="background: #BC6608; color: white" id="btn_actualizar<?php echo $id_categoria;?>">Actualizar</button>
                                                    </div>
                                                 </div>
                                               </div>
                                            </div>
                                            <script>
                                              $('#btn_actualizar<?php echo $id_categoria;?>').click(function(){

                                                var nombre_categoria = $('#nombre_categoria<?php echo $id_categoria;?>').val();
                                                
                                                var id_categoria = '<?php echo $id_categoria;?>';

                                                if(nombre_categoria == ""){
                                                  $('#nombre_categoria<?php echo $id_categoria;?>').focus();
                                                  $('#requerido_actualizar<?php echo $id_categoria;?>').css('display','block');
                                                }else{
                                                var url = "../app/controllers/categorias/actualizar_categorias.php";
                                                  $.get(url, {nombre_categoria: nombre_categoria, id_categoria: id_categoria}, function(datos){
                                                  $('#respuesta_actualizar<?php echo $id_categoria;?>').html(datos);
                                                  });
                                                }
                                              } );
                                            </script>
                                            <div id="respuesta_actualizar<?php echo $id_categoria;?>"></div>
                                    </div> 
                                    </center>
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
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header" style="background: #038510; color: white">
              <h4 class="modal-title">Creación de una nueva categoria</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
             <div class="row">
                <div class="col col-md-12">
                  <div class="form-group">
                    <label for="">Nombre de la Categoria</label>
                    <input type="text" id="nombre_categoria" class="form-control">
                    <small style="color: red; display: none" id="requerido_crear">* Este campo es requerido</small>
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
  var nombre_categoria = $('#nombre_categoria').val();
  if(nombre_categoria == ""){
   $('#nombre_categoria').focus();
   $('#requerido_crear').css('display','block');

  }else{
  var url = "../app/controllers/categorias/registro_categorias.php";
  $.get(url, {nombre_categoria: nombre_categoria}, function(datos){
  $('#respuesta').html(datos);
 });
}
});
</script>
<div id="respuesta"></div>

