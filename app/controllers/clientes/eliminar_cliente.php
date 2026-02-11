<?php
include('../../config.php');

$id_cliente = $_GET ['id_cliente'];

$eliminar_cliente = $pdo->prepare("DELETE FROM clientes WHERE id_cliente = :id_cliente");
$eliminar_cliente->bindParam('id_cliente', $id_cliente);

if ($eliminar_cliente->execute()){
        session_start();
           $_SESSION ['mensaje'] = "Cliente eliminado correctamente";
           $_SESSION ['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/clientes/";
    </script>
    <?php
   
    }else{
        session_start();
           $_SESSION ['mensaje'] = "No se ha podido eliminar el cliente";
           $_SESSION ['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/clientes/";
    </script>
    <?php
    }
?>