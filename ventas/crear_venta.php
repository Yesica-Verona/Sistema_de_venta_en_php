<?php
include ('../app/config.php');
include ('../layout/session.php');
include ('../layout/parte1.php');
include ('../app/controllers/ventas/lista_ventas.php');
include('../app/controllers/productos/lista_productos.php');
include('../app/controllers/clientes/lista_clientes.php');


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



<!-- titulo de bienvenida -->
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
            <h1 class="m-0">Ventas</h1>
      </div>
    </div>
    <!--contenido-->
    <div class="content">
        <div class="container-fluid">
              <!--session carrito-->
                 <div class="row">
                      <div class="col-md-12">
                           <div class="card">
                               <div class="card-header" style="background: #038510; color: white">
                                   <?php 
                                   $contador_de_ventas = 0;
                                   foreach ($tabla_ventas as $tabla_venta){
                                    $contador_de_ventas = $contador_de_ventas + 1;
                                   }
                                   ?>
                                   <h3 class="card-title"> <i class="nav-icon fas fa-coins"></i>  Venta Nro. 
                                   <input type="text" value="<?php echo $contador_de_ventas + 1; ?>" id="nro_venta" hidden >
                                   <input type="text" style="text-align: center;" value="<?php echo $contador_de_ventas + 1; ?>" disabled></h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                       </button>
                                   </div>
                                </div>
                               <div class="card-body">                                                       
                                    <b>Carrito</b>                                          
                                    <button type="button" class="btn btn-sm btn-info mx-5"
                                        data-toggle="modal" data-target="#modal-buscar_producto">   
                                        <i class="fa fa-search"></i>
                                        Buscar Producto                                            
                                    </button>
                                    <br>
                                    <br>
                                    <div class="modal fade" id="modal-buscar_producto">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header btn-info">
                                                    <h4 class="modal-title">Busqueda del Producto</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                   </button>
                                                </div>
                                                <div class="modal-body"> 
                                                    <div class="table table-responsive">
                                                       <table id="buscadorTabla" class="table table-bordered table-hover">               
                                                          <thead>
                                                              <tr>
                                                                 <th>N°</th>
                                                                 <th>Acción</th>
                                                                 <th>Código</th>
                                                                 <th>Categoría</th>
                                                                 <th>Imagen</th>
                                                                 <th>Nombre</th>
                                                                 <th>Descripción</th>
                                                                 <th>Stock</th>
                                                                 <th>Precio de Venta</th>  
                                                                 <th>Usuario</th>
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
                                                                 <td>
                                                                      <button class="btn btn-info" id="btn_seleccionar<?php echo $id_producto; ?>"> Seleccionar</button>
                                                                      <script>
                                                                           $('#btn_seleccionar<?php echo $id_producto; ?>').click (function(){

                                                                            var id_producto = "<?php echo $id_producto; ?>";
                                                                            $('#id_producto') .val(id_producto);
                                                                            var producto = "<?php echo $tabla_producto['nombre']; ?>";
                                                                            $('#producto') .val(producto);
                                                                            var descripcion = "<?php echo $tabla_producto['descripcion']; ?>";
                                                                            $('#descripcion') .val(descripcion);
                                                                            var precio_venta = "<?php echo $tabla_producto['precio_venta']; ?>";
                                                                            $('#precio_venta') .val(precio_venta); 

                                                                            var stock = "<?php echo $tabla_producto['stock']; ?>";
                                                                               $('#stock') .val(stock);
                                                                                $('#stock_actual') .val(stock);
                                                                                
                                                                            $('#cantidad_venta').focus();                                                                          
                                                                           }                                                              
                                                                        );
                                                                      </script>
                                                                 </td>
                                                                 <td><?php echo $tabla_producto['codigo']; ?></td>
                                                                 <td><?php echo $tabla_producto['nombre_categoria']; ?></td>
                                                                 <td><img src="<?php echo $URL."/productos/img_productos/".$tabla_producto['imagen']; ?>" alt="" width="40px" ></td>
                                                                 <td><?php echo $tabla_producto['nombre']; ?></td>
                                                                 <td><?php echo $tabla_producto['descripcion']; ?></td>
                                                                 <td><?php echo $tabla_producto['stock']; ?></td>                   
                                                                 <td><?php echo $tabla_producto['precio_venta']; ?></td>
                                                                 <td><?php echo $tabla_producto['email']; ?></td>                                                                                       
                                                               </tr>
                                                              <?php
                                                              }
                                                              ?>
                                                         </tbody>
                                                      </table>
                                                      <div class="row">
                                                          <div class="col-md-4">
                                                             <div class="form-group">
                                                                 <input type="text" id="id_producto" hidden>
                                                                 <label for="">Producto</label>
                                                                 <input type="text" class="form-control" id="producto" disabled>
                                                             </div>                                         
                                                          </div>
                                                          <div class="col-md-4">
                                                              <div class="form-group">
                                                                 <label for="">Detalle</label>
                                                                 <input type="text" class="form-control" id="descripcion" disabled>
                                                             </div>                                         
                                                          </div>
                                                          <div class="col-md-2">
                                                              <div class="form-group">
                                                                 <label for="">Cantidad</label>
                                                                 <input type="number" id="stock_actual" hidden>
                                                                 <input type="number" id="stock_total" hidden>
                                                                 <input type="number" class="form-control" id="cantidad_venta">
                                                                  <script>
                                                                        $('#cantidad_venta').keyup(function(){
                                                                          var stock_actual = $('#stock_actual').val();
                                                                          var stock_ventas = $('#cantidad_venta').val();

                                                                          var total = parseInt(stock_actual) - parseInt(stock_ventas);
                                                                          $('#stock_total').val(total);
                                                                        });
                                                                  </script>
                                                                
                                                             </div>                                         
                                                          </div>
                                                          <div class="col-md-2">
                                                             <div class="form-group">
                                                                 <label for="">Precio Unitario</label>
                                                                 <input type="text" class="form-control" id="precio_venta" disabled>
                                                             </div>                                         
                                                          </div>
                                                      </div>
                                                      <button style="float: right; background: #038510; color: white" id="btn_enviar_al_carrito" class="btn">Enviar al Carrito</button>
                                                      <div id="respuesta_carrito"></div>
                                                      <script>
                                                         $('#btn_enviar_al_carrito').click (function(){
                                                            var nro_venta = '<?php echo $contador_de_ventas + 1; ?>';                                                           
                                                            var id_producto = $('#id_producto').val();
                                                            var cantidad_venta = $('#cantidad_venta').val();
                                                            var stock_total = $('#stock_total').val();

                                                            if(id_producto == ""){
                                                               alert ("Debe selecionar un producto");
                                                            }else if(cantidad_venta == ""){
                                                               alert ("Debe llenar la cantidad del producto");  
                                                            }else{
                                                               var url = "../app/controllers/ventas/enviar_al_carrito.php";
                                                               $.get(url, {nro_venta: nro_venta, id_producto: id_producto, cantidad_venta: cantidad_venta, stock_total: stock_total}, function(datos){
                                                               $('#respuesta_carrito').html(datos);
                                                               });
                                                            }

                                                         });

                                                      </script>
                                                 </div>                                                  
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 
                                 <div class="table-responsive">                                
                                      <table class="table table-bordered table-hover">
                                          <thead>
                                              <tr style="text-align: center; background: #f0f0f0;">
                                                  <th>Nro</th>
                                                  <th>Producto</th>
                                                  <th>Detalle</th>
                                                  <th>Cantidad</th>
                                                  <th>Precio Unitario</th>
                                                  <th>Precio Subtotal</th>
                                                  <th>Acción</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                                <?php
                                                    $contador_de_carrito = 0;
                                                    $nro_venta = $contador_de_ventas + 1;
                                                    $cantidad_total = 0;
                                                    $precio_unitario_total = 0;
                                                    $precio_total = 0;
                                                    
                                                    $sql_carrito= "SELECT *, pro.nombre AS nombre_producto, pro.descripcion AS descripcion, pro.precio_venta AS precio_venta
                                                                   FROM carrito AS car INNER JOIN productos AS pro ON car.id_producto = pro.id_producto  
                                                                   WHERE nro_venta = '$nro_venta' ORDER BY id_carrito ASC";
                                                    $query_carrito= $pdo->prepare($sql_carrito);
                                                    $query_carrito->execute();
                                                    $tabla_carritos =$query_carrito->fetchAll( PDO:: FETCH_ASSOC);
                                                    foreach ($tabla_carritos as $tabla_carrito){
                                                        $id_carrito = $tabla_carrito['id_carrito'];
                                                        $id_producto = $tabla_carrito['id_producto'];
                                                        $contador_de_carrito = $contador_de_carrito + 1;
                                                        $cantidad_total = $cantidad_total + $tabla_carrito['cantidad']; 
                                                        $precio_unitario_total = $precio_unitario_total + $tabla_carrito['precio_venta'];
                                                ?>
                                                    <tr>
                                                        <td><center><?php echo $contador_de_carrito; ?></center></td>
                                                        <td><?php echo $tabla_carrito['nombre_producto']; ?></td>
                                                        <td><?php echo $tabla_carrito['descripcion']; ?></td>
                                                        <td><center><?php echo $tabla_carrito['cantidad']; ?></center></td>
                                                        <td><center><?php echo $tabla_carrito['precio_venta']; ?></center></td>
                                                        <td><center>
                                                            <?php
                                                              $cantidad = floatval( $tabla_carrito['cantidad']);
                                                              $precio_venta = floatval( $tabla_carrito['precio_venta']);
                                                              echo $subtotal = $cantidad * $precio_venta;
                                                              $precio_total = $precio_total + $subtotal;
                                                            ?>
                                                        </center></td>
                                                        <td><center>
                                                            <form action="../app/controllers/ventas/eliminar_carrito.php" method="post">
                                                                <input type="text" name="id_carrito" value="<?php echo $id_carrito; ?>" hidden>
                                                                <button type="submit" class="btn btn-sm" style="background: #A83A1A; color: white"> <i class="fas fa-trash"></i>Eliminar</button>
                                                                
                                                            </form>
                                                        </center></td>
                          
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                               <tr>
                                                   <th colspan="3" style="text-align: right">Total</th>
                                                   <th><center><?php echo $cantidad_total; ?></center></th>
                                                   <th><center><?php echo $precio_unitario_total; ?></center></th>
                                                   <th><center><?php echo $precio_total;?></center></th>
                                               </tr>
                                          </tbody>
                                      </table>
                                      <input type="text" id="id_carrito" value="<?php echo $id_carrito; ?>" hidden>
                                 </div>
                              </div>                                
                         </div>
                     </div>                
                 </div>
             <!--cierre carrito--> 
                  <div class="row">
                       <div class="col-md-8">
                           <div class="card">
                               <div class="card-header" style="background: #038510; color: white">
                                   <h3 class="card-title"> <i class="nav-icon fas fa-user-check"></i>  Datos del cliente </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                       </button>
                                   </div>
                                </div>
                               <div class="card-body">
                                    <b>Cliente</b>                                          
                                    <button type="button" class="btn btn-sm btn-info mx-5"
                                        data-toggle="modal" data-target="#modal_buscar_cliente">   
                                        <i class="fa fa-search"></i>
                                        Buscar Cliente                                           
                                    </button>
                                    <br>
                                    <br>
                                    <div class="modal fade" id="modal_buscar_cliente">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header btn-info">
                                                    <h4 class="modal-title">Busqueda del Cliente</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                   </button>
                                                </div>
                                                <div class="modal-body"> 
                                                    <div class="table table-responsive">
                                                       <table id="buscadorCliente" class="table table-bordered table-hover">               
                                                          <thead>
                                                              <tr>
                                                                 <th>N°</th>
                                                                 <th>Acción</th>
                                                                 <th>Nombre del Cliente</th>
                                                                 <th>Nit/CC</th>
                                                                 <th>Celular</th>
                                                                 <th>Correo</th>
                                                              </tr>
                                                          </thead>
                                                          <tbody>
                                                              <?php 
                                                                  $contador_de_clientes = 0;
                                                                  foreach($tabla_clientes as $tabla_cliente){

                                                                  $id_cliente = $tabla_cliente['id_cliente'];
                                                                  $contador_de_clientes = $contador_de_clientes + 1;
                                                               ?> 
                                                               <tr>
                                                                   <td><?php echo $contador_de_clientes; ?></td>
                                                                   <td>
                                                                      <center><button class="btn btn-info" id="btn_seleccionar_cliente<?php echo $id_cliente; ?>">Seleccionar</button></center>
                                                                      <script>                                                                        
                                                                          $('#btn_seleccionar_cliente<?php echo $id_cliente; ?>').click(function(){

                                                                            var id_cliente = '<?php echo $tabla_cliente['id_cliente']; ?>';
                                                                            $('#id_cliente').val(id_cliente);
                                                                            var nombre_cliente = '<?php echo $tabla_cliente['nombre_cliente']; ?>';
                                                                            $('#nombre_cliente').val(nombre_cliente);
                                                                            var nit_di_cliente = '<?php echo $tabla_cliente['nit_di_cliente']; ?>';
                                                                            $('#nit_di_cliente').val(nit_di_cliente);
                                                                            var celular_cliente = '<?php echo $tabla_cliente['celular_cliente']; ?>';
                                                                            $('#celular_cliente').val(celular_cliente);
                                                                            var correo_cliente = '<?php echo $tabla_cliente['correo_cliente']; ?>';
                                                                            $('#correo_cliente').val(correo_cliente);
                                                                            $('#modal_buscar_cliente').modal('toggle');
                                                                          });
                                                                      </script>
                                                                   </td>
                                                                   <td><?php echo $tabla_cliente['nombre_cliente']; ?></td>
                                                                   <td><center><?php echo $tabla_cliente['nit_di_cliente']; ?></center></td>
                                                                   <td><center><?php echo $tabla_cliente['celular_cliente']; ?></center></td>
                                                                   <td><center><?php echo $tabla_cliente['correo_cliente']; ?></center></td>
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
                                    
                                  <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group">                                         
                                             <input type="text" id="id_cliente" hidden>
                                             <label for="">Nombre del cliente</label>
                                             <input type="text" class="form-control" id="nombre_cliente" disabled>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="">Nit/CC</label>
                                             <input type="text" class="form-control" id="nit_di_cliente" disabled>
                                         </div>
                                     </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="">Celular</label>
                                             <input type="text" class="form-control" id="celular_cliente" disabled>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="">Correo</label>
                                             <input type="text" class="form-control" id="correo_cliente" disabled>
                                         </div>
                                      </div>
                                  </div>
                               </div>
                               
                          </div>
                       </div>
                     
                       <div class="col-md-4">
                           <div class="card">
                               <div class="card-header" style="background: #038510; color: white">
                                   <h3 class="card-title"> <i class="nav-icon fas fa-coins"></i> Registro de Venta </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                       </button>
                                   </div>
                                </div>
                               <div class="card-body">
                                    <div class="form-group">
                                         <label for="">Monto a pagar</label>
                                         <input type="text" style="text-align: center;" id="precio_total" class="form-control" value="<?php echo $precio_total;?>" disabled>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Total pagado</label>
                                                <input type="text" style="text-align: center;" class="form-control" id="total_pagado">
                                                <script>
                                                     $('#total_pagado').keyup(function(){
                                                        var precio_total = '<?php echo $precio_total;?>';
                                                        var total_pagado = $('#total_pagado').val();

                                                        var total = parseInt(total_pagado)  - parseInt(precio_total);
                                                        $('#cambio_devolver').val(total);
                                                     })
                                               </script>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Cambio</label>
                                                <input type="text" style="text-align: center;" class="form-control" id="cambio_devolver" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                             <div class="form-group">
                                                 <label for="">Usuario</label>
                                                 <input type="text" class="form-control" value="<?php echo $email_session;?>" disabled>
                                             </div>
                                        </div>
                                    </div>
                                    <hr>              
                                    <div class="col-md-12">
                                        <div class="form-group">
                                           <button 
                                            class="btn btn-block" style="background: #038510; color: white" id="btn_guardar_venta">Guardar Venta</button>
                                       </div>
                                    </div>
                                    <script>
                                       $('#btn_guardar_venta').click(function(){

                                            var id_producto = $('#id_producto').val();
                                            var id_cliente =  $('#id_cliente').val();
                                            var precio_total = $('#precio_total').val();
                                            var total_pagado = $('#total_pagado').val();
                                            var nro_venta = $('#nro_venta').val();
                                            var id_carrito = '<?php echo $id_carrito; ?>';
                                            var id_usuario = '<?php echo $id_usuario_session; ?>';

                                            if (id_cliente == ""){
                                              $('#id_cliente').focus();
                                              alert("Seleccione un cliente");
                                            }else if(precio_total == ""){ 
                                              $('#precio_total').focus();
                                             alert("Todos los campos son requeridos precio total");
                                            }else if(total_pagado == ""){ 
                                              $('#total_pagado').focus();
                                              alert("Todos los campos son requeridos total pagado");
                                            } 
                                            $.get("../app/controllers/ventas/crear_venta.php", {id_cliente: id_cliente, precio_total: precio_total, nro_venta: nro_venta,  id_usuario: id_usuario
                                            }, function (respuesta) {

                                           if (respuesta.trim() === "OK") {
                                             window.open("../app/controllers/ventas/factura.php?nro_venta=" + nro_venta, "_blank");
                                             location.reload();
                                            } else {
                                               alert("Error al guardar la venta");
                                            }
                                         });                      
                                        });
                                  </script>
                               </div>                               
                          </div>
                       </div>
                   </div>
        </div>   
    </div>
</div>

<script>
  $(document).ready(function() {
        $('#buscadorTabla').DataTable();
    });
    $('#buscadorTabla').DataTable({
        paging: true,        // habilita paginación
        searching: true,     // habilita búsqueda
        order: [[0, 'asc']], // ordena por la columna en ascendentemente

        dom: 'Bfrtip',
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json' // para idioma español
        }

    });


    $(document).ready(function() {
        $('#buscadorCliente').DataTable();
    });
    $('#buscadorCliente').DataTable({
        paging: true,        // habilita paginación
        searching: true,     // habilita búsqueda
        order: [[0, 'asc']], // ordena por la columna en ascendentemente

        dom: 'Bfrtip',
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json' // para idioma español
        }

    });
</script>
<?php
include ('../layout/mensaje.php');
include ('../layout/parte2.php');
?>
