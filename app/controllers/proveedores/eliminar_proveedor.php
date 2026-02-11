<?php
include('../../config.php');

$id_proveedor = $_GET ['id_proveedor'];

$eliminar_proveedor = $pdo->prepare("DELETE FROM proveedores WHERE id_proveedor = :id_proveedor");
$eliminar_proveedor->bindParam('id_proveedor', $id_proveedor);

if ($eliminar_proveedor->execute()){
        session_start();
           $_SESSION ['mensaje'] = "Proveedor eliminado correctamente";
           $_SESSION ['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/proveedores/";
    </script>
    <?php
   
    }else{
        session_start();
           $_SESSION ['mensaje'] = "No se ha podido eliminar el proveedor";
           $_SESSION ['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/proveedores/";
    </script>
    <?php
    }
?>