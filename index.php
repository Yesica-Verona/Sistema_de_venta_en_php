<?php
include ('app/config.php');
include ('layout/session.php');
include ('layout/parte1.php');
include ('app/controllers/usuarios/lista_usuarios.php');
include ('app/controllers/roles/lista_roles.php');
include ('app/controllers/categorias/lista_categorias.php');
include ('app/controllers/productos/lista_productos.php');
include ('app/controllers/proveedores/lista_proveedores.php');
include ('app/controllers/compras/lista_compras.php');
include ('app/controllers/clientes/lista_clientes.php');
include ('app/controllers/ventas/lista_ventas.php');
?>
<!-- titulo de bienvenida -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
            <h1 class="m-0">BIENVENIDO AL SISTEMA PETSFRIENDS - <?php echo $session_rol; ?> </h1>
      </div>
    </div>
    <br>
    <br>
    <!--contenido-->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- ./col -->


          <?php if(tienePermiso('modulo_usuarios')) { ?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div style="background: #E5AD01" class="small-box">
              <div class="inner">
                <?php 
                    $contador_usuarios = 0;
                    foreach($tabla_usuarios as $tabla_usuario){   
                    $contador_usuarios = $contador_usuarios + 1;
                    }               
                ?>                            
                <h3> <?php echo $contador_usuarios; ?> </h3>
                <p>Usuarios Registrados</p>
              </div>
              <a href="<?php echo $URL; ?>usuarios/crear_usuario.php"> 
              <div class="icon">              
                  <i class="fas fa-user-plus"></i>               
              </div>
              </a>
              <a href="<?php echo $URL; ?>usuarios/index.php" class="small-box-footer">
                Más información<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
         <?php } ?>


         <?php if(tienePermiso('modulo_roles')) { ?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div style="background: #BD951F"  class="small-box">
              <div class="inner">
                <?php 
                    $contador_roles = 0;
                    foreach($tabla_roles as $tabla_rol){   
                    $contador_roles = $contador_roles + 1;
                    }               
                ?>                            
                <h3><?php echo $contador_roles; ?></h3>
                <p>Roles Registrados </p>
              </div>
              <a href="<?php echo $URL; ?>roles/crear_rol.php"> 
              <div class="icon">              
                  <i class="fas fa-address-card"></i>               
              </div>
              </a>
              <a href="<?php echo $URL; ?>roles/index.php" class="small-box-footer">
                Más información<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <?php } ?>

          <?php if(tienePermiso('modulo_categorias')) { ?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div style="background: #E61700"  class="small-box">
              <div class="inner">
                <?php 
                    $contador_categorias = 0;
                    foreach($tabla_categorias as $tabla_categoria){   
                    $contador_categorias = $contador_categorias + 1;
                    }               
                ?>                            
                <h3> <?php echo $contador_categorias; ?> </h3>
                <p>Categorias Registradas</p>
              </div>
              <a href="<?php echo $URL; ?>categorias/"> 
              <div class="icon">              
                  <i class="fas fa-tags"></i>               
              </div>
              </a>
              <a href="<?php echo $URL; ?>categorias/" class="small-box-footer">
                Más información<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <?php } ?>

          <?php if(tienePermiso('modulo_productos')) { ?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div style="background: #BD2F1F"  class="small-box">
              <div class="inner">
                <?php 
                    $contador_productos = 0;
                    foreach($tabla_productos as $tabla_producto){   
                    $contador_productos = $contador_productos + 1;
                    }               
                ?>                            
                <h3> <?php echo $contador_productos; ?></h3>
                <p> Productos Registrados </p>
              </div>
              <a href="<?php echo $URL; ?>productos/crear_producto.php"> 
              <div class="icon">              
                  <i class="fas fa-list"></i>               
              </div>
              </a>
              <a href="<?php echo $URL; ?>productos/index.php" class="small-box-footer">
                Más información<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <?php } ?>

          <?php if(tienePermiso('modulo_proveedores')) { ?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div style="background: #1FBB2C"  class="small-box">
              <div class="inner">
                <?php 
                    $contador_proveedores = 0;
                    foreach($tabla_proveedores as $tabla_proveedor){   
                    $contador_proveedores = $contador_proveedores + 1;
                    }               
                ?>                            
                <h3> <?php echo $contador_proveedores; ?></h3>
                <p> Proveedores Registrados </p>
              </div>
              <a href="<?php echo $URL; ?>proveedores/"> 
              <div class="icon">              
                  <i class="fas fa-truck"></i>               
              </div>
              </a>
              <a href="<?php echo $URL; ?>proveedores/" class="small-box-footer">
                Más información<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <?php } ?>


          <?php if(tienePermiso('modulo_compras')) { ?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div style="background: #309138"  class="small-box">
              <div class="inner">
                <?php 
                    $contador_compras = 0;
                    foreach($tabla_compras as $tabla_compra){   
                    $contador_compras = $contador_compras + 1;
                    }               
                ?>                            
                <h3> <?php echo $contador_compras; ?></h3>
                <p> Compras Registradas </p>
              </div>
              <a href="<?php echo $URL; ?>compras/crear_compra.php"> 
              <div class="icon">              
                  <i class="fas fa-cart-plus"></i>               
              </div>
              </a>
              <a href="<?php echo $URL; ?>compras/" class="small-box-footer">
                Más información<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <?php } ?>


          <?php if(tienePermiso('modulo_clientes')) { ?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div style="background: #0097E5"  class="small-box">
              <div class="inner">
                <?php 
                    $contador_clientes = 0;
                    foreach($tabla_clientes as $tabla_cliente){   
                    $contador_clientes = $contador_clientes + 1;
                    }               
                ?>                            
                <h3> <?php echo $contador_clientes; ?></h3>
                <p> Clientes Registrados </p>
              </div>
              <a href="<?php echo $URL; ?>clientes/"> 
              <div class="icon">              
                  <i class="fas fa-user-check"></i>               
              </div>
              </a>
              <a href="<?php echo $URL; ?>clientes/" class="small-box-footer">
                Más información<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <?php } ?>


          <?php if(tienePermiso('modulo_ventas')) { ?>
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div style="background: #1F88BD"  class="small-box">
              <div class="inner">
                <?php 
                    $contador_ventas = 0;
                    foreach($tabla_ventas as $tabla_venta){   
                    $contador_ventas = $contador_ventas + 1;
                    }               
                ?>                            
                <h3> <?php echo $contador_ventas; ?></h3>
                <p> Ventas Registradas </p>
              </div>
              <a href="<?php echo $URL; ?>ventas/crear_venta.php"> 
              <div class="icon">              
                  <i class="fas fa-coins"></i>               
              </div>
              </a>
              <a href="<?php echo $URL; ?>ventas/" class="small-box-footer">
                Más información<i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <?php } ?>


        </div>
      </div>
    </div>
  </div>
<?php
include ('layout/parte2.php');
?>