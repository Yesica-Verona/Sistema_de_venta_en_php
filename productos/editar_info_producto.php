<?php
include ('../app/config.php');
include ('../layout/session.php');
include ('../layout/parte1.php');
include('../app/controllers/categorias/lista_categorias.php');
include('../app/controllers/productos/cargar_productos.php');

?>
<!-- titulo de bienvenida -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
            <h1 class="m-0">Actualizar los datos de un producto </h1>
      </div>
    </div>
    <!--contenido-->
    <div class="content">
        <div class="container-fluid">
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
                      <div class="card-body">
                          <div class="row">
                            <div class="col-md-12">
                                <form action="../app/controllers/productos/actualizar_producto.php" method="POST" enctype="multipart/form-data">
                                    <input type="text" value="<?php echo $id_producto_get; ?>" name="id_producto" hidden>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row">
                                               <div class="col-md-4">
                                                   <div class="form-group">                                                  
                                                       <label for="">Código:</label>
                                                                                                     
                                                       <input type="text" class="form-control" 
                                                       value="<?php echo $codigo; ?>" disabled>
                                                       <input type="text" name="codigo" value="<?php echo $codigo; ?>" hidden>
                                                   </div>
                                               </div>
                                               <div class="col-md-4"> 
                                                    <div class="form-group">
                                                       <label for="">Categoria:</label> 
                                                       <div style="display:flex;">                                          
                                                           <select name="id_categoria" id="" class="form-control" required>
                                                           <?php
                                                               foreach ($tabla_categorias as $tabla_categoria){
                                                                   $nombre_categoria_tabla = $tabla_categoria['nombre_categoria'];
                                                                   $id_categoria = $tabla_categoria['id_categoria'];
                                                            ?>
                                                           <option value="<?php echo $id_categoria; ?>"
                                                           <?php 
                                                                if($nombre_categoria_tabla == $nombre_categoria){
                                                            ?>
                                                                selected ="selected"
                                                           <?php
                                                           }
                                                           ?>
                                                         > <?php echo $nombre_categoria_tabla; ?> </option>
                                                           <?php
                                                           }
                                                           ?>                                      
                                                       </select> 
                                                      
                                                       </div>
                                                   </div>                                                 
                                               </div>
                                               <div class="col-md-4"> 
                                                   <div class="form-group">
                                                       <label for="">Nombre del Producto:</label>
                                                       <input type="text" name="nombre" class="form-control" value="<?php echo $nombre;?>" required>
                                                   </div>
                                               </div>
                                               
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                       <label for="">Usuario:</label>
                                                       <input type="text" class="form-control" value="<?php echo $email;?>" disabled>
                                                       <input type="text"name="id_usuario" value="<?php echo $id_usuario; ?>" hidden>
                                                   </div>
                                                </div>
                                                <div class="col-md-8"> 
                                                   <div class="form-group">
                                                       <label for="">Descripción del Producto:</label>
                                                       <textarea name="descripcion" id="" class="form-control" ><?php echo $descripcion; ?></textarea>
                                                   </div>
                                               </div>
                                            </div>
                                            <div class="row">
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Stock:</label>
                                                       <input type="number" name="stock" class="form-control" value="<?php echo $stock; ?>" required>
                                                   </div>
                                                </div>
                                                <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Stock Mínimo:</label>
                                                       <input type="number" name="stock_minimo" class="form-control" value="<?php echo $stock_minimo; ?>">
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Stock Máximo:</label>
                                                       <input type="number" name="stock_maximo" class="form-control" value="<?php echo $stock_maximo; ?>">
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Precio Compra:</label>
                                                       <input type="number" name="precio_compra" class="form-control" value="<?php echo $precio_compra; ?>" required>
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Precio Venta:</label>
                                                       <input type="number" name="precio_venta" class="form-control" value="<?php echo $precio_venta; ?>" required>
                                                   </div>
                                               </div>
                                               <div class="col-md-2">
                                                   <div class="form-group">
                                                       <label for="">Fecha de ingreso:</label>
                                                       <input type="date" name="fecha_ingreso" class="form-control" value="<?php echo $fecha_ingreso; ?>" required>
                                                   </div>
                                               </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Imagen del Producto</label>
                                           <input type="file" id="file" name="imagen" class="form-control" accept="image/*">
                                           <input type="text" name="imagen_text" value="<?php echo $imagen;?>" hidden>
                                           <div id="list">
                                            <img src="<?php echo $URL."/productos/img_productos/".$imagen;?>" alt="" width="150px">
                                           </div>

                                          <script>
                                              function archivo(evt) {
                                                 var files = evt.target.files;
                                                 var outputDiv = document.getElementById('list');
                                                 outputDiv.innerHTML = ''; // Limpiar contenido previo
                                                 for (var i = 0, f; f = files[i]; i++) {
                                                   if (!f.type.match('image.*')) {
                                                      continue; // Solo procesa imágenes
                                                    }
                                                  var reader = new FileReader();
                                                  reader.onload = (function(theFile) {
                                                      return function(e) {
                                                       // Crear la etiqueta <img> y asignarle la fuente
                                                       var img = document.createElement('img');
                                                       img.src = e.target.result;
                                                       img.className = 'thumb thumbnail';
                                                       img.width = 150; // tamaño en píxeles
                                                       img.title = escape(theFile.name);         
                                                        // Agregar la imagen al div
                                                       outputDiv.appendChild(img);
                                                        };
                                                    })(f);
                                                   reader.readAsDataURL(f);
                                                }
                                            }
                                            document.getElementById('file').addEventListener('change', archivo, false);
                                          </script>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn" style="background: #BC6608; color: white">Actualizar Producto</button>
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