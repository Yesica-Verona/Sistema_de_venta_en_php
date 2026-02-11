<?php
include('../../config.php');

$id_categoria = $_GET ['id_categoria'];
$nombre_categoria = $_GET ['nombre_categoria'];

$actualizar_categoria = $pdo->prepare("UPDATE categorias SET nombre_categoria = :nombre_categoria, fyh_actualizacion = :fyh_actualizacion
                                     WHERE id_categoria = :id_categoria");
$actualizar_categoria->bindParam('nombre_categoria', $nombre_categoria);
$actualizar_categoria->bindParam('fyh_actualizacion', $fecha_hora);
$actualizar_categoria->bindParam('id_categoria', $id_categoria);

  if($actualizar_categoria->execute()){
     session_start();
       $_SESSION ['mensaje'] = "La categoria ha sido actualizada correctamente";
       $_SESSION ['icono'] = "success";
   // header('Location:' .$URL. 'roles');
   ?>
    <script>
        location.href = "<?php echo $URL;?>/categorias/";
    </script>
    <?php
  }else{
     session_start();
       $_SESSION ['mensaje'] = "No se ha podido actualizar la categoria";
       $_SESSION ['icono'] = "error";
     //  header('Location:' .$URL. 'roles/editar_rol.php?id=' . $id_rol);
     ?>
    <script>
        location.href = "<?php echo $URL;?>/categorias/";
    </script>
    <?php
  }
?>