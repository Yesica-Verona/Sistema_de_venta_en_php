<?php
include ('../app/config.php');
include ('../layout/session.php');
include ('../layout/parte1.php');
include('../app/controllers/productos/cargar_productos.php');



?>
<!-- titulo de bienvenida -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
            <h2 class="m-0">Datos del producto: <?php echo $nombre; ?></h2>
      </div>
    </div>
    <!--contenido-->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                     <div class="card">
                       <div class="card-header" style="background: #1560EA; color: white">
                            <h3 class="card-title">Detalles</h3>
                          <div class="card-tools">
                              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                               </button>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                               <div class="col-md-4">
                                                   <div class="form-group">
                                                       <label for="">Código:</label>
                                                                                                    
                                                       <input type="text" class="form-control" 
                                                       value="<?php echo $codigo; ?>" disabled>                               
                                                   </div>
                                               </div>
                                               <div class="col-md-4"> 
                                                    <div class="form-group">
                                                       <label for="">Categoria:</label> 
                                                       <input type="text" class="form-control" value="<?php echo $nombre_categoria; ?>" disabled>
                                                   </div>                                                 
                                               </div>
                                               <div class="col-md-4"> 
                                                   <div class="form-group">
                                                       <label for="">Nombre del Producto:</label>
                                                       <input type="text" class="form-control" value="<?php echo $nombre; ?>" disabled>
                                                   </div>
                                               </div>
                                               
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                       <label for="">Usuario:</label>
                                                       <input type="text" class="form-control" value="<?php echo $email;?>" disabled>
                                                   </div>
                                                </div>
                                                <div class="col-md-8"> 
                                                   <div class="form-group">
                                                       <label for="">Descripción del Producto:</label>
                                                       <textarea id="" class="form-control" disabled><?php echo $descripcion;?></textarea>
                                                   </div>
                                               </div>
                                            </div>
                                            <div class="row">
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Stock:</label>
                                                       <input type="number" class="form-control" value="<?php echo $stock;?>" disabled>
                                                   </div>
                                                </div>
                                                <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Stock Mínimo:</label>
                                                       <input type="number" class="form-control" value="<?php echo $stock_minimo;?>" disabled>
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Stock Máximo:</label>
                                                       <input type="number" class="form-control"  value="<?php echo $stock_maximo;?>" disabled>
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Precio Compra:</label>
                                                       <input type="number" class="form-control"  value="<?php echo $precio_compra;?>" disabled>
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Precio Venta:</label>
                                                       <input type="number" class="form-control"  value="<?php echo $precio_venta;?>" disabled>
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Fecha de ingreso:</label>
                                                       <input type="date" class="form-control"  value="<?php echo $fecha_ingreso;?>" disabled>
                                                   </div>
                                               </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Imagen del Producto</label>
                                            <center>
                                                <img src="<?php echo $URL."/productos/img_productos/".$imagen;?>" alt="" width="150px">
                                            </center>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-secondary">Volver</a>
                                    </div>
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