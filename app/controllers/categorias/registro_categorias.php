<?php
include ('../../config.php');
$nombre_categoria =$_GET['nombre_categoria'];

  $guardar_categoria = $pdo->prepare("INSERT INTO categorias (nombre_categoria, fyh_creacion) VALUES (:nombre_categoria, :fyh_creacion)");
    $guardar_categoria->bindParam('nombre_categoria', $nombre_categoria);
    $guardar_categoria->bindParam('fyh_creacion', $fecha_hora);
    if ($guardar_categoria->execute()){
        session_start();
           $_SESSION ['mensaje'] = "Categoria creada correctamente";
           $_SESSION ['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/categorias/";
    </script>
    <?php
   
    }else{
        session_start();
           $_SESSION ['mensaje'] = "No se ha podido crear la categoria";
           $_SESSION ['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/categorias/";
    </script>
    <?php
    }
    
?>