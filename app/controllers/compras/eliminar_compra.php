<?php
include('../../config.php');

$id_compra = $_GET['id_compra'];
$id_producto_tabla= $_GET['id_producto_tabla'];
$cantidad = $_GET['cantidad'];
$stock_actual = $_GET['stock_actual'];

$pdo->beginTransaction();

    $guardar_compra = $pdo->prepare("DELETE FROM compras WHERE id_compra = :id_compra"); 
    $guardar_compra->bindParam('id_compra', $id_compra);

 if ($guardar_compra->execute()){

    //para actualizar el stock
    $stock = $stock_actual - $cantidad;
    $actualizar = $pdo->prepare("UPDATE productos SET stock = :stock WHERE id_producto = :id_producto");
    $actualizar->bindParam('stock', $stock);
    $actualizar->bindParam('id_producto', $id_producto_tabla);
    $actualizar->execute();

    $pdo->commit();
        session_start();
           $_SESSION ['mensaje'] = "Compra eliminada correctamente";
           $_SESSION ['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/compras/";
    </script>
    <?php
   
    }else{

    $pdo->rollBack();
    
        session_start();
           $_SESSION ['mensaje'] = "No se ha podido eliminar la compra";
           $_SESSION ['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/compras/";
    </script>
    <?php
    } 
    

?>
