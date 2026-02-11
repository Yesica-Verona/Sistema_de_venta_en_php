<?php
include ('session.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de ventas | PetsFriends</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo $URL; ?>public/css/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL; ?>public/css/adminlte.min.css">
 <!-- sweetalert2 Para alertas  -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">SISTEMA DE VENTAS</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
    </ul>
  </nav>
  
  <!-- contenedor de aside lateral-->
  <aside  class="main-sidebar sidebar-dark-primary  elevation-4">
    <!-- Logo  -->
    <a href="../index.php" class="brand-link">
      <img src="<?php echo $URL; ?>/public/img/icono-pag.jpg" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PetsFriends</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"> <?php echo $session_nombres; ?> </a>
          <a href="#" class="d-block"> <?php echo $email_session; ?> </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php if(tienePermiso('modulo_usuarios')) { ?>
         <li class="nav-item menu">
            <a style="background: #22610D" href="#" class="nav-link active" >
              <i class="nav-icon fas fa-users"></i>
              <p>
                USUARIOS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL; ?>usuarios" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Listado de Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL; ?>usuarios/crear_usuario.php" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Crear Nuevo Usuario</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>


          <?php if(tienePermiso('modulo_roles')) { ?>
          <li class="nav-item menu">
            <a style="background: #22610D" href="#" class="nav-link active">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                ROLES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL; ?>roles" class="nav-link">
                  <i class="fas fa-address-book nav-icon"></i>
                  <p>Listado de Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL; ?>roles/crear_rol.php" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Crear Nuevo Rol</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <?php if(tienePermiso('modulo_categorias')) { ?>
          <li class="nav-item menu">
            <a style="background: #22610D" href="#" class="nav-link active">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                CATEGORIAS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL; ?>categorias" class="nav-link">
                  <i class="fas fa-tag nav-icon"></i>
                  <p>Listado de categorias</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <?php if(tienePermiso('modulo_productos')) { ?>
          <li class="nav-item menu">
            <a style="background: #22610D" href="#" class="nav-link active">
              <i class="nav-icon fas fa-list"></i>
              <p>
                PRODUCTOS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL; ?>productos/" class="nav-link">
                  <i class="fas fa-bars nav-icon"></i>
                  <p>Listado de Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL; ?>productos/crear_producto.php" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Crear Nuevo Producto</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <?php if(tienePermiso('modulo_compras')) { ?>
          <li class="nav-item menu">
            <a style="background: #22610D" href="#" class="nav-link active">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                COMPRAS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">             
              <li class="nav-item">
                <a href="<?php echo $URL; ?>compras/" class="nav-link">
                  <i class=" fas fa-cart-plus nav-icon"></i>
                  <p>Listado de Compras</p>
                </a>
              </li>            
              <li class="nav-item">
                <a href="<?php echo $URL; ?>compras/crear_compra.php" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Crear Nueva Compra</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>


          <?php if(tienePermiso('modulo_proveedores')) { ?>
          <li class="nav-item menu">
            <a style="background: #22610D" href="#" class="nav-link active">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                PROVEEDORES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL; ?>proveedores/" class="nav-link">
                  <i class="fas fa-car nav-icon"></i>
                  <p>Listado de Proveedores</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>


          <?php if(tienePermiso('modulo_ventas')) { ?>
          <li class="nav-item menu">
            <a style="background: #22610D" href="#" class="nav-link active">
              <i class="nav-icon fas fa-coins"></i>
              <p>
                 VENTAS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL; ?>ventas/" class="nav-link">
                  <i class="fas fa-coins nav-icon"></i>
                  <p>Listado de Ventas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $URL; ?>ventas/crear_venta.php" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Crear Nueva Venta</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <?php if(tienePermiso('modulo_clientes')) { ?>
          <li class="nav-item menu">
            <a style="background: #22610D" href="#" class="nav-link active">
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                CLIENTES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $URL; ?>clientes/" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Listado de Clientes</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <li class="nav-item">
            <a style="background: #942014" href="<?php echo $URL; ?>/app/controllers/login/cerrar_session.php" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p> SALIR</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
