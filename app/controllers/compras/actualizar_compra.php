<?php
include('../../config.php');

$id_compra = $_GET['id_compra'];
$id_producto = $_GET ['id_producto'];
$numero_compra = $_GET ['numero_compra'];
$fecha_compra = $_GET ['fecha_compra'];
$comprobante = $_GET ['comprobante'];
$id_proveedor = $_GET ['id_proveedor'];
$id_usuario = $_GET ['id_usuario'];
$precio_compra_total = $_GET ['precio_compra_total'];
$cantidad_de_la_compra = $_GET ['cantidad_de_la_compra'];
$stock_total = $_GET ['stock_total'];

$pdo->beginTransaction();




    $actualizar_compra = $pdo->prepare("UPDATE compras SET id_producto = :id_producto, numero_compra = :numero_compra, fecha_compra = :fecha_compra,
                                                        comprobante = :comprobante, id_proveedor = :id_proveedor, id_usuario = :id_usuario, 
                                                        precio_compra = :precio_compra, cantidad = :cantidad, fyh_actualizacion = :fyh_actualizacion
                                    WHERE id_compra = :id_compra");
    
    $actualizar_compra->bindParam('id_compra', $id_compra);
    $actualizar_compra->bindParam('id_producto', $id_producto);
    $actualizar_compra->bindParam('numero_compra',  $numero_compra);
    $actualizar_compra->bindParam('fecha_compra', $fecha_compra);
    $actualizar_compra->bindParam('comprobante', $comprobante);
    $actualizar_compra->bindParam('id_proveedor', $id_proveedor);
    $actualizar_compra->bindParam('id_usuario', $id_usuario);
    $actualizar_compra->bindParam('precio_compra', $precio_compra_total);
    $actualizar_compra->bindParam('cantidad', $cantidad_de_la_compra);
    $actualizar_compra->bindParam('fyh_actualizacion', $fecha_hora);


 if ($actualizar_compra->execute()){


    //para actualizar el stock

    $actualizar = $pdo->prepare("UPDATE productos SET stock = :stock WHERE id_producto = :id_producto");
    $actualizar->bindParam('stock', $stock_total);
    $actualizar->bindParam('id_producto', $id_producto);
    $actualizar->execute();

    $pdo->commit();

        session_start();
           $_SESSION ['mensaje'] = "Compra actualizada correctamente";
           $_SESSION ['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/compras/";
    </script>
    <?php
   
    }else{

    $pdo->rollBack();
    
        session_start();
           $_SESSION ['mensaje'] = "No se ha podido actualizar la compra";
           $_SESSION ['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/compras/";
    </script>
    <?php
    } 
    

?>