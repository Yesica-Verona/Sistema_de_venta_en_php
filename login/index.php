<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Ventas</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/css/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../public/css/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/css/adminlte.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition login-page">
  <?php
  session_start();
  if(isset($_SESSION['mensaje'])) {
  $respuesta = $_SESSION['mensaje'];
  //cerramos para concatenar el php con las etiquetas de html
  ?> 
  <script>
   Swal.fire({
    position: "center",
    icon: "error",
    title: "<?php echo $respuesta; ?>",
    showConfirmButton: false,
    timer: 3000
   });
  </script>
  <?php
  }
  ?>
<div class="login-box">
   <div class="text-center">
     <img src="../public/img/icono-pag.jpg" style="width: 160px;" class="rounded-circle">
     <img src="../public/img/logo.png" style="width:300px;">
   </div>
   <br>
  <div class="card card-outline card-primary">

    <div class="card-header text-center">
      <a href="../public/template/AdminLTE-3.2.0/index2.html" class="h1"><b>Sistema de  </b>Ventas</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Ingrese sus datos</p>
      <form action="../app/controllers/login/ingreso.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Correo electrónico" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="password_usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">INGRESAR</button>
          </div> 
        </div>
      </form>
    </div>
  </div>
</div>


<!-- jQuery -->
<script src="../public/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../public/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../public/js/adminlte.min.js"></script>
</body>
</html>
