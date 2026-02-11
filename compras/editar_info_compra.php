<?php
include ('../app/config.php');
include ('../layout/session.php');
include ('../layout/parte1.php');
include('../app/controllers/productos/lista_productos.php');
include('../app/controllers/proveedores/lista_proveedores.php');
include('../app/controllers/compras/cargar_compra.php');

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
            <h1 class="m-0">Actualizar los datos de la Compra</h1>
      </div>
    </div>
    <!--contenido-->
    <div class="content">
        <div class="container-fluid">
         <div class="row">
            <div class="col-md-9">
                <div class="row">
                <div class="col-md-12">
                     <div class="card">
                       <div class="card-header" style="background: #BC6608; color: white">
                            <h3 class="card-title">Verifique los datos antes de actualizar</h3>
                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                               </button>
                          </div>
                      </div>
                      <div class="card-body" style="font-size: 12px;">                       
                        <div style="display: flex;">
                            <h5>Datos del Producto</h5>                      
                            <button type="button" class="btn btn-sm btn-info mx-5"
                                data-toggle="modal" data-target="#modal-buscar_producto">   
                                <i class="fa fa-search"></i>
                                Buscar Producto  
                            </button>
                            <div class="modal fade" id="modal-buscar_producto">
                                <div class="modal-dialog modal-lg">
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
                                                                 var id_producto = "<?php echo $tabla_producto['id_producto']; ?>";
                                                                 $('#id_producto') .val(id_producto);
                                                                 var codigo = "<?php echo $tabla_producto['codigo']; ?>";
                                                                 $('#codigo') .val(codigo);
                                                                 var nombre_categoria = "<?php echo $tabla_producto['nombre_categoria']; ?>";
                                                                 $('#nombre_categoria') .val(nombre_categoria);
                                                                 var nombre = "<?php echo $tabla_producto['nombre']; ?>";
                                                                 $('#nombre_producto') .val(nombre);
                                                                 var email = "<?php echo $tabla_producto['email']; ?>";
                                                                 $('#usuario_producto') .val(email);
                                                                 var descripcion = "<?php echo $tabla_producto['descripcion']; ?>";
                                                                 $('#descripcion_producto') .val(descripcion);
                                                                 var stock = "<?php echo $tabla_producto['stock']; ?>";
                                                                 $('#stock') .val(stock);
                                                                 $('#stock_actual') .val(stock);
                                                                 var stock_minimo = "<?php echo $tabla_producto['stock_minimo']; ?>";
                                                                 $('#stock_minimo') .val(stock_minimo);
                                                                 var stock_maximo = "<?php echo $tabla_producto['stock_maximo']; ?>";
                                                                 $('#stock_maximo') .val(stock_maximo);
                                                                 var precio_compra = "<?php echo $tabla_producto['precio_compra']; ?>";
                                                                 $('#precio_compra') .val(precio_compra);
                                                                 var precio_venta = "<?php echo $tabla_producto['precio_venta']; ?>";
                                                                 $('#precio_venta') .val(precio_venta);
                                                                 var fecha_ingreso = "<?php echo $tabla_producto['fecha_ingreso']; ?>";                                     
                                                                 $('#fecha_ingreso') .val(fecha_ingreso);

                                                                 var ruta_img = "<?php echo $URL."/productos/img_productos/".$tabla_producto['imagen']; ?>";
                                                                 $('#img_producto').attr({src : ruta_img});

                                                                 $('#modal-buscar_producto').modal('toggle');

                                                                }
                                                               
                                                                );
                                                            </script>
                                                         </td>
                                                         <td><?php echo $tabla_producto['codigo']; ?></td>
                                                         <td><?php echo $tabla_producto['nombre_categoria']; ?></td>
                                                         <td>
                                                             <img src="<?php echo $URL."/productos/img_productos/".$tabla_producto['imagen']; ?>" alt="" width="60px" >                                 
                                                         </td>
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
  
                                            </div>                                                  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="row">
                            <div class="col-md-12">
                               <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                               <div class="col-md-4">
                                                   <div class="form-group">
                                                       <input type="text" value="<?php echo $id_producto_tabla; ?>"  id="id_producto" hidden>
                                                       <label for="">Código:</label>                                                                                                  
                                                       <input type="text" class="form-control" id="codigo" value="<?php echo $codigo; ?>" disabled>                               
                                                   </div>
                                               </div>
                                               <div class="col-md-4"> 
                                                    <div class="form-group">
                                                       <label for="">Categoria:</label> 
                                                       <input type="text" class="form-control" id="nombre_categoria" value="<?php echo $nombre_categoria; ?>" disabled>
                                                   </div>                                                 
                                               </div>
                                               <div class="col-md-4"> 
                                                   <div class="form-group">
                                                       <label for="">Nombre del Producto:</label>
                                                       <input type="text" class="form-control" id="nombre_producto" value="<?php echo $nombre_producto; ?>" disabled>
                                                   </div>
                                               </div>
                                               
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                       <label for="">Usuario:</label>
                                                       <input type="text" class="form-control" id="usuario_producto" value="<?php echo $nombre_usuario; ?>" disabled>
                                                   </div>
                                                </div>
                                                <div class="col-md-8"> 
                                                   <div class="form-group">
                                                       <label for="">Descripción del Producto:</label>
                                                       <textarea id="descripcion_producto" class="form-control" disabled> <?php echo $descripcion; ?></textarea>
                                                   </div>
                                               </div>
                                            </div>
                                            <div class="row">
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Stock:</label>
                                                       <input type="number" class="form-control" id="stock" value="<?php echo $stock; ?>" disabled>
                                                   </div>
                                                </div>
                                                <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Stock Mínimo:</label>
                                                       <input type="number" class="form-control" id="stock_minimo" value="<?php echo $stock_minimo; ?>" disabled>
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Stock Máximo:</label>
                                                       <input type="number" class="form-control"  id="stock_maximo" value="<?php echo $stock_maximo; ?>" disabled>
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Precio Compra:</label>
                                                       <input type="number" class="form-control"  id="precio_compra" value="<?php echo $precio_compra_producto; ?>" disabled>
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Precio Venta:</label>
                                                       <input type="number" class="form-control"  id="precio_venta" value="<?php echo $precio_venta_producto; ?>" disabled>
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Fecha de ingreso:</label>
                                                       <input type="date" class="form-control" style="font-size: 12px"  id="fecha_ingreso" value="<?php echo $fecha_ingreso; ?>"  disabled>
                                                   </div>
                                               </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Imagen del Producto</label>
                                            <center>
                                                <img src="<?php echo $URL."/productos/img_productos/".$imagen;?>" alt="" width="150px" id="img_producto">
                                            </center>

                                        </div>
                                    </div>
                             </div>
                             
                          </div> 
                          <hr>
                          <div style="display: flex;">
                             <h5>Datos del Proveedor</h5>                      
                             <button type="button" class="btn btn-sm btn-info mx-5"
                                 data-toggle="modal" data-target="#modal-buscar_proveedor">   
                                 <i class="fa fa-search"></i>
                                 Buscar Proveedor 
                             </button>
                             <div class="modal fade" id="modal-buscar_proveedor">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header btn-info">
                                            <h4 class="modal-title">Busqueda del Proveedor</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body"> 
                                            <div class="table table-responsive">
                                               <table id="proveedorTabla" class="table table-bordered table-hover table-responsive">               
                                                   <thead>
                                                       <tr>
                                                          <th>N°</th>
                                                          <th>Seleccionar</th>
                                                          <th>Nombre del Proveedor</th>
                                                          <th>Celular</th>
                                                          <th>Telefono de empresa</th>
                                                          <th>Nombre de la empresa</th>
                                                          <th>Correo</th>
                                                          <th>Dirección</th>
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
                                                           <td> 
                                                               <button class="btn btn-info" id="btn_seleccionar_proveedor<?php echo $id_proveedor; ?>"> Seleccionar</button>
                                                               <script>
                                                                  $('#btn_seleccionar_proveedor<?php echo $id_proveedor; ?>').click (function(){
                                                                  var id_proveedor = "<?php echo $tabla_proveedor['id_proveedor']; ?>";
                                                                  $('#id_proveedor') .val(id_proveedor);
                                                                  var nombre_proveedor = "<?php echo $tabla_proveedor['nombre_proveedor']; ?>";
                                                                  $('#nombre_proveedor') .val(nombre_proveedor);
                                                                  var celular = "<?php echo $tabla_proveedor['celular']; ?>";
                                                                  $('#celular') .val(celular);
                                                                  var telefono_empresa = "<?php echo $tabla_proveedor['telefono_empresa']; ?>";
                                                                  $('#telefono_empresa') .val(telefono_empresa);
                                                                  var empresa = "<?php echo $tabla_proveedor['empresa']; ?>";
                                                                  $('#empresa') .val(empresa);
                                                                  var email = "<?php echo $tabla_proveedor['email']; ?>";
                                                                  $('#email') .val(email);
                                                                  var direccion = "<?php echo $tabla_proveedor['direccion']; ?>";
                                                                  $('#direccion') .val(direccion);
                                                                  $('#modal-buscar_proveedor').modal('toggle');
                                                                  }
                                                                  );
                                                               </script>
                                                           </td>
                                                           <td> <?php echo $tabla_proveedor['nombre_proveedor']; ?></td>
                                                           <td> <a href="http://wa.me/57<?php echo $tabla_proveedor['celular']; ?>" class="btn btn-success btn-sm" target="_black"><i class="fas fa-phone" style="color: white"></i>
                                                                <?php echo $tabla_proveedor['celular']; ?></a>
                                                           </td>
                                                           <td> <?php echo $tabla_proveedor['telefono_empresa']; ?></td>
                                                           <td> <?php echo $tabla_proveedor['empresa']; ?></td>
                                                           <td> <?php echo $tabla_proveedor['email']; ?></td>
                                                           <td> <?php echo $tabla_proveedor['direccion']; ?></td>                               
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
                          <hr>  
                          <div class="row">                            
                                <div class="col-md-4">
                                   <div class="form-group">
                                       <input type="text" value="<?php echo $id_proveedor_tabla; ?>"  id="id_proveedor" hidden>
                                       <label for="">Nombre del Proveedor </label>
                                       <input type="text" id="nombre_proveedor" class="form-control" value="<?php echo $nombre_proveedor_tabla; ?>" disabled>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group">
                                        <label for="">Celular </label>
                                        <input type="number" id="celular" class="form-control" value="<?php echo $celular; ?>" disabled>
                                  </div>
                             </div>
                             <div class="col-md-4">
                                   <div class="form-group">
                                      <label for="">Telefono de empresa</label>
                                      <input type="number" id="telefono_empresa" class="form-control" value="<?php echo $telefono_empresa; ?>" disabled>
                                  </div>
                              </div>
                         </div>
                         <div class="row">
                               <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="">Empresa </label>
                                       <input type="text" id="empresa" class="form-control" value="<?php echo $empresa; ?>" disabled>
                                   </div>
                               </div>                        
                               <div class="col-md-4">
                                   <div class="form-group">
                                       <label for="">Correo electronico</label>
                                       <input type="email" id="email" class="form-control" value="<?php echo $email_proveedor; ?>"disabled>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="">Dirección </label>
                                       <input type="text" id="direccion" class="form-control" value="<?php echo $direccion; ?>" disabled>
                                   </div>
                              </div>
                         </div>
                                             
                     </div>
                 </div>
                </div>
            </div>

            </div>
            <div class="col-md-3">
              <div class="card" style="border-top: 4px solid #BC6608;">
                   <div class="card-header">
                      <h3 class="card-title">Detalle de la Compra</h3>
                      <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>
               </div>
               <div class="card-body">
                 <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="">Número de compra</label>
                              <input type="text" value="<?php echo $numero_compra; ?>" class="form-control" disabled>
                              <input type="text" value="<?php echo $numero_compra; ?>" id="numero_compra" hidden >
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="">Fecha de compra</label>
                              <input type="date" class="form-control" id="fecha_compra" value="<?php echo $fecha_compra; ?>">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="">Comprobante de la compra</label>
                              <input type="text" class="form-control" id="comprobante" value="<?php echo $comprobante; ?>">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="">Precio de la compra</label>
                              <input type="text" class="form-control" id="precio_compra_total" value="<?php echo $precio_compra; ?>">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Stock actual</label>
                              <input type="text" id="stock_actual" class="form-control" value="<?php echo $stock = $stock - $cantidad;; ?>" disabled>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Stock Total</label>
                              <input type="text" id="stock_total" class="form-control" disabled>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="">Cantidad de la compra</label>
                              <input type="number" id="cantidad_de_la_compra" class="form-control" value="<?php echo $cantidad; ?>">
                              <script>
                                  $('#cantidad_de_la_compra').keyup(function(){
                                    $sumaCantidades();
                                  });
                                  $sumaCantidades();
                                  function $sumaCantidades(){
                                    var stock_actual = $('#stock_actual').val();
                                    var stock_compra = $('#cantidad_de_la_compra').val();

                                    var total = parseInt(stock_actual)  + parseInt(stock_compra);
                                    $('#stock_total').val(total);
                                  };
                              </script>
                          </div>
                      </div>
                      <div class="col-md-12">
                         <div class="form-group">
                              <label for="">Usuario</label>
                              <input type="text" class="form-control" value="<?php echo $nombre_usuario;?>" disabled>
                          </div>
                      </div>
                  </div>     
                  <hr>                  
                  <div class="form-group">
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                        <button class="btn" style="background: #BC6608; color: white" id="btn_actualizar_compra">Actualizar Compra</button>
                 </div>
                 <script>
                    $('#btn_actualizar_compra').click(function(){
                        var id_compra = '<?php echo $id_compra; ?>';
                        var id_producto = $('#id_producto').val();
                        var numero_compra = $('#numero_compra').val();
                        var fecha_compra = $('#fecha_compra').val();
                        var comprobante = $('#comprobante').val();
                        var id_proveedor = $('#id_proveedor').val();
                        var id_usuario = '<?php echo $id_usuario_session; ?>';
                        var precio_compra_total = $('#precio_compra_total').val();
                        var cantidad_de_la_compra = $('#cantidad_de_la_compra').val();
                        var stock_total = $('#stock_total').val();

                        if(id_producto == ""){
                           $('#id_producto').focus();
                           alert("Todos los campos son requeridos");
                         }else if (fecha_compra == ""){
                           $('#fecha_compra').focus();
                           alert("Todos los campos son requeridos");
                         }else if(comprobante == ""){ 
                           $('#comprobante').focus();
                           alert("Todos los campos son requeridos");
                         }else if(precio_compra_total == ""){
                           $('#precio_compra_total').focus();
                           alert("Todos los campos son requeridos");
                         }else if (cantidad_de_la_compra == ""){
                           $('#cantidad_de_la_compra').focus();
                           alert("Todos los campos son requeridos");
                        }else{
                            var url = "../app/controllers/compras/actualizar_compra.php";
                             $.get(url, {id_compra: id_compra, id_producto: id_producto, numero_compra: numero_compra, fecha_compra: fecha_compra, comprobante: comprobante, id_proveedor: id_proveedor, id_usuario: id_usuario, precio_compra_total: precio_compra_total, cantidad_de_la_compra: cantidad_de_la_compra, stock_total: stock_total}, function(datos){
                             $('#respuesta_actualizar').html(datos);
                            });
                        }
                        
                    });
                 </script>
              </div>
            </div>
             <div class="" id="respuesta_actualizar"> </div> 

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
        $('#proveedorTabla').DataTable();
    });
    $('#proveedorTabla').DataTable({
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
