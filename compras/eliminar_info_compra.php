<?php
include ('../app/config.php');
include ('../layout/session.php');
include ('../layout/parte1.php');
include('../app/controllers/productos/lista_productos.php');
include('../app/controllers/proveedores/lista_proveedores.php');
include('../app/controllers/compras/cargar_compra.php');
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
            <h1 class="m-0">Compra Nro. <?php echo $numero_compra; ?></h1>
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
                       <div class="card-header" style="background: #A83A1A; color: white">
                            <h3 class="card-title">¿Desea eliminar la compra?</h3>
                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                               </button>
                          </div>
                      </div>
                      <div class="card-body" style="font-size: 12px;">                       
                          <div class="row">
                            <div class="col-md-12">
                                <h5>Datos del Producto</h5> 
                               <div class="row">
                                        <div class="col-md-9">                                            
                                            <div class="row">                                               
                                               <div class="col-md-4">
                                                   <div class="form-group">
                                                       <input type="text" value="<?php echo $id_producto_tabla; ?>" id="id_producto" hidden>
                                                       <label for="">Código:</label>                                                                                                  
                                                       <input type="text" class="form-control" value="<?php echo $codigo; ?>" id="codigo" disabled>                               
                                                   </div>
                                               </div>
                                               <div class="col-md-4"> 
                                                    <div class="form-group">
                                                       <label for="">Categoria:</label> 
                                                       <input type="text" class="form-control" value="<?php echo $nombre_categoria; ?>" id="nombre_categoria" disabled>
                                                   </div>                                                 
                                               </div>
                                               <div class="col-md-4"> 
                                                   <div class="form-group">
                                                       <label for="">Nombre del Producto:</label>
                                                       <input type="text" class="form-control" value="<?php echo $nombre_producto; ?>" id="nombre_producto" disabled>
                                                   </div>
                                               </div>
                                               
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                       <label for="">Usuario:</label>
                                                       <input type="text" class="form-control" value="<?php echo $nombre_usuario; ?>" id="usuario_producto"disabled>
                                                   </div>
                                                </div>
                                                <div class="col-md-8"> 
                                                   <div class="form-group">
                                                       <label for="">Descripción del Producto:</label>
                                                       <textarea id="descripcion_producto" class="form-control" disabled><?php echo $descripcion; ?></textarea>
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
                                                       <input type="number" class="form-control" value="<?php echo $stock_minimo; ?>" id="stock_minimo" disabled>
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Stock Máximo:</label>
                                                       <input type="number" class="form-control" value="<?php echo $stock_maximo; ?>" id="stock_maximo" disabled>
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Precio Compra:</label>
                                                       <input type="number" class="form-control" value="<?php echo $precio_compra_producto; ?>" id="precio_compra" disabled>
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Precio Venta:</label>
                                                       <input type="number" class="form-control" value="<?php echo $precio_venta_producto; ?>"  id="precio_venta" disabled>
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Fecha de ingreso:</label>
                                                       <input type="date" class="form-control" value="<?php echo $fecha_ingreso; ?>" id="fecha_ingreso" disabled>
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
                          <h5>Datos del Proveedor</h5> 
                          <div class="row">                            
                                <div class="col-md-4">
                                   <div class="form-group">
                                       <input type="text"  id="id_proveedor" hidden>
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
                                       <input type="email" id="email" class="form-control" value="<?php echo $email_proveedor; ?>" disabled>
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
              <div class="card" style="border-top: 4px solid #A83A1A;">
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
                              <input type="text" value=" <?php echo $id_compra_get; ?>" class="form-control" disabled>
                              <input type="text" value=" <?php echo $id_compra_get; ?>" id="numero_compra" hidden >
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="">Fecha de compra</label>
                              <input type="date" class="form-control" id="fecha_compra" value="<?php echo $fecha_compra; ?>" disabled>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="">Comprobante de la compra</label>
                              <input type="text" class="form-control" id="comprobante" value="<?php echo $comprobante; ?>" disabled>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="">Precio de la compra</label>
                              <input type="text" class="form-control" id="precio_compra_total" value="<?php echo $precio_compra; ?>" disabled>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="">Cantidad de la compra</label>
                              <input type="number" id="cantidad_de_la_compra" class="form-control" value="<?php echo $cantidad; ?>" disabled>  
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
                      <div class="form-group">
                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" id="btn_eliminar_compra" class="btn" style="background: #A83A1A; color: white">Eliminar Compra</button>
                     </div>
                                
                     <div id="respuesta_eliminar"></div>
                     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                     <script>
                        $('#btn_eliminar_compra').click(function(){
                            var id_compra = '<?php echo $id_compra_get;?>';
                            var id_producto_tabla = $('#id_producto').val();
                            var cantidad = '<?php echo $cantidad; ?>';
                            var stock_actual = '<?php echo $stock; ?>';

                           Swal.fire({
                                title: '¿Estas seguro de eliminar la Compra?',
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonColor:'#A83A1A',
                                cancelButtonColor:'#bbb9b9',
                                confirmButtonText:'Si, deseo eliminar',
                            }).then((result) => {
                                if(result.isConfirmed){
                                    eliminar();
                                }
                            });
                            function eliminar(){
                                var url = "../app/controllers/compras/eliminar_compra.php";
                                $.get(url, {id_compra: id_compra, id_producto_tabla: id_producto_tabla, cantidad: cantidad, stock_actual: stock_actual},function(datos){
                                     $('#respuesta_eliminar').html(datos);
                                });
                            }                       
                        });
                     </script>
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