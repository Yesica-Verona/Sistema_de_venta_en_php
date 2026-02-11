<?php
include ('../app/config.php');
include ('../layout/session.php');
include ('../layout/parte1.php');
include('../app/controllers/productos/lista_productos.php');

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
            <h1 class="m-0">Lista de Productos</h1>
      </div>
    </div>
    <!--contenido-->
    <div class="content">
      <div class="container-fluid">
           <div class="row">
                <div class="col-12">
                   <div class="card card-outline card-success">
                       <div class="card-header">
                            <h3 class="card-title">Productos Registrados</h3>
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
                                  <th>Código</th>
                                  <th>Categoría</th>
                                  <th>Imagen</th>
                                  <th>Nombre</th>
                                  <th>Descripción</th>
                                  <th>Stock</th>
                                  <th>Precio de Venta</th>  
                                  <th>Usuario</th>                               
                                  <th>Acciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php 
                                $contador = 0;
                                foreach($tabla_productos as $tabla_producto){
                                 $id_producto = $tabla_producto['id_producto'];
                              ?>
                              <tr>
                                <td><?php echo $contador = $contador + 1; ?></td>
                                <td><?php echo $tabla_producto['codigo']; ?></td>
                                <td><?php echo $tabla_producto['nombre_categoria']; ?></td>
                                <td>
                                  <img src="<?php echo $URL."/productos/img_productos/".$tabla_producto['imagen']; ?>" alt="" width="60px">                                 
                                </td>
                                <td><?php echo $tabla_producto['nombre']; ?></td>
                                <td><?php echo $tabla_producto['descripcion']; ?></td>
                                <?php
                                $stock_actual = $tabla_producto['stock'];
                                $stock_maximo = $tabla_producto['stock_maximo'];
                                $stock_minimo = $tabla_producto['stock_minimo'];
                                if($stock_actual < $stock_minimo){?>
                                <td style="background: #ee9193"><?php echo $tabla_producto['stock']; ?></td>
                                <?php
                                }
                                else if($stock_actual > $stock_maximo){?>
                                 <td style="background: #a4e49e"><?php echo $tabla_producto['stock']; ?></td>
                                 <?php
                                }else { ?>
                                 <td><?php echo $tabla_producto['stock']; ?></td>
                                 <?php
                                }
                                ?>
                                                   
                                <td><?php echo $tabla_producto['precio_venta']; ?></td>
                                <td><?php echo $tabla_producto['email']; ?></td>                               
                                <td>
                                     <center>
                                      <div class="btn-group">
                                      <a href="ver_info_producto.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-sm" style="background: #1560EA; color: white"> <i class="fas fa-eye"></i>Ver </a>
                                      <a href="editar_info_producto.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-sm" style="background: #BC6608; color: white"><i class="fas fa-pen"></i>Editar</a>
                                      <a href="eliminar_info_producto.php?id=<?php echo $id_producto; ?>" type="button" class="btn btn-sm" style="background: #A83A1A; color: white"><i class="fas fa-trash"></i>Eliminar</a>
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
