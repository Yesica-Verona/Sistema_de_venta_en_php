<?php
include ('../app/config.php');
include ('../layout/session.php');
include ('../layout/parte1.php');
include('../app/controllers/compras/lista_compras.php');


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
            <h1 class="m-0">Lista de Compras</h1>
      </div>
    </div>
    <!--contenido-->
    <div class="content">
      <div class="container-fluid">
           <div class="row">
                <div class="col-12">
                   <div class="card card-outline card-success">
                       <div class="card-header">
                            <h3 class="card-title">Compras Registradas</h3>
                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                               </button>
                          </div>
                          <!-- /.card-tools -->
                       </div>
                      <div class="card-body">   
                         <div class="table table-responsive">
                               <table id="miTabla" class="table table-bordered table-hover">               
                          <thead>
                              <tr>
                                  <th>N°</th>
                                  <th>N° de compra</th>
                                  <th>Producto</th>
                                  <th>Fecha de compra</th>
                                  <th>Proveedor</th>
                                  <th>Comprobante</th>
                                  <th>Usuario</th>
                                  <th>Precio de Compra</th>  
                                  <th> <center>Cantidad</center></th>                               
                                  <th>Acciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php 
                                $contador = 0;
                                foreach($tabla_compras as $tabla_compra){
                                 $id_compra = $tabla_compra['id_compra'];
                              ?>
                              <tr>
                                <td><?php echo $contador = $contador + 1; ?></td>
                                <td><?php echo $tabla_compra['numero_compra']; ?></td>
                                <td>
                                   <button type="button" class="btn btn-sm btn-info" 
                                      data-toggle="modal" data-target="#modal-producto<?php echo $id_compra;?>">
                                     <?php echo $tabla_compra['nombre_producto']; ?>       
                                   </button>
                                   <div class="modal fade" id="modal-producto<?php echo $id_compra;?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header btn-info">
                                                    <h4 class="modal-title">Datos del Producto</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                               <div class="col-md-2">
                                                                    <div class="form-group">
                                                                       <label for="">Código</label>
                                                                       <input type="text" value="<?php echo $tabla_compra['codigo']; ?>" class="form-control" disabled>
                                                                   </div>
                                                               </div>
                                                               <div class="col-md-5">
                                                                   <div class="form-group">
                                                                       <label for="">Nombre del producto</label>
                                                                       <input type="text" value="<?php echo $tabla_compra['nombre_producto']; ?>" class="form-control" disabled>
                                                                   </div>
                                                               </div>
                                                               <div class="col-md-5">
                                                                   <div class="form-group">
                                                                       <label for="">Descripción</label>
                                                                       <input type="text" value="<?php echo $tabla_compra['descripcion']; ?>" class="form-control" disabled>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                           <div class="row">
                                                               <div class="col-md-3">
                                                                   <div class="form-group">
                                                                       <label for="">Stock</label>
                                                                       <input type="text" value="<?php echo $tabla_compra['stock']; ?>" class="form-control" disabled>
                                                                   </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                   <div class="form-group">
                                                                        <label for="">Stock Minimo</label>
                                                                        <input type="text" value="<?php echo $tabla_compra['stock_minimo']; ?>" class="form-control" disabled>
                                                                   </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                   <div class="form-group">
                                                                       <label for="">Stock Maximo</label>
                                                                       <input type="text" value="<?php echo $tabla_compra['stock_maximo']; ?>" class="form-control" disabled>
                                                                   </div>
                                                               </div>
                                                               <div class="col-md-3">
                                                                   <div class="form-group">
                                                                       <label for="">Fecha Ingreso</label>
                                                                       <input type="text" value="<?php echo $tabla_compra['fecha_ingreso']; ?>" class="form-control" disabled>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                           <div class="row">
                                                               <div class="col-md-3">
                                                                    <div class="form-group">
                                                                       <label for="">Precio Compra</label>
                                                                       <input type="text" value="<?php echo $tabla_compra['precio_compra_producto']; ?>" class="form-control" disabled>
                                                                   </div>
                                                               </div>
                                                               <div class="col-md-3">
                                                                   <div class="form-group">
                                                                       <label for="">Precio Venta</label>
                                                                       <input type="text" value="<?php echo $tabla_compra['precio_venta_producto']; ?>" class="form-control" disabled>
                                                                   </div>
                                                               </div>
                                                               <div class="col-md-3">
                                                                    <div class="form-group">
                                                                       <label for="">Categoria</label>
                                                                       <input type="text" value="<?php echo $tabla_compra['nombre_categoria']; ?>" class="form-control" disabled>
                                                                   </div>
                                                               </div>
                                                               <div class="col-md-3">
                                                                    <div class="form-group">
                                                                       <label for="">Usuario</label>
                                                                       <input type="text" value="<?php echo $tabla_compra['nombre_usuario_producto']; ?>" class="form-control" disabled>
                                                                   </div>
                                                               </div>
                                                           </div>                                                      
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">Imagen del Producto</label>
                                                               <center>
                                                                   <img src="<?php echo $URL."/productos/img_productos/".$tabla_compra['imagen'];?>" alt="" width="150px">
                                                               </center>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo $tabla_compra['fecha_compra']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info" 
                                      data-toggle="modal" data-target="#modal-proveedor<?php echo $id_compra;?>">
                                     <?php echo $tabla_compra['nombre_proveedor']; ?>       
                                   </button>
                                   <div class="modal fade" id="modal-proveedor<?php echo $id_compra;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header btn-info">
                                                    <h4 class="modal-title">Datos del Proveedor</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body"> 
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Nombre del Proveedor</label>
                                                                 <input type="text" value="<?php echo $tabla_compra['nombre_proveedor']; ?>" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Celular del Proveedor</label>
                                                                <a href="http://wa.me/57<?php echo $tabla_compra['celular_proveedor']; ?>" 
                                                                  class="btn btn-success btn-sm" target="_black"><i class="fas fa-phone" style="color: white"></i>
                                                                <?php echo $tabla_compra['celular_proveedor']; ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Empresa</label>
                                                                <input type="text" value="<?php echo $tabla_compra['empresa']; ?>" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Telefono de la empresa</label>
                                                                <input type="text" value="<?php echo $tabla_compra['telefono_empresa']; ?>" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Email</label>
                                                                <input type="text" value="<?php echo $tabla_compra['email_proveedor']; ?>" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Dirección</label>
                                                                <input type="text" value="<?php echo $tabla_compra['direccion_proveedor']; ?>" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       </div>
                                   </div>

                                </td>
                                <td><?php echo $tabla_compra['comprobante']; ?></td>
                                <td><?php echo $tabla_compra['nombre_usuario']; ?></td>
                                <td><?php echo $tabla_compra['precio_compra']; ?></td>
                                <td><?php echo $tabla_compra['cantidad']; ?></td>
                                                              
                                <td>
                                     <center>
                                      <div class="btn-group">
                                      <a href="ver_info_compra.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-sm" style="background: #1560EA; color: white"> <i class="fas fa-eye"></i>Ver </a>
                                      <a href="editar_info_compra.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-sm" style="background: #BC6608; color: white"><i class="fas fa-pen"></i>Editar</a>
                                      <a href="eliminar_info_compra.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-sm" style="background: #A83A1A; color: white"><i class="fas fa-trash"></i>Eliminar</a>
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