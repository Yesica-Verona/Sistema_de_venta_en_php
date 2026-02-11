<?php
include('../../config.php');

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




    $guardar_compra = $pdo->prepare("INSERT INTO compras (id_producto, numero_compra, fecha_compra, comprobante, id_proveedor, id_usuario, precio_compra, cantidad, fyh_creacion) 
                                                     VALUES (:id_producto, :numero_compra, :fecha_compra, :comprobante, :id_proveedor, :id_usuario, :precio_compra, :cantidad, :fyh_creacion)");
    
    
    $guardar_compra->bindParam('id_producto', $id_producto);
    $guardar_compra->bindParam('numero_compra',  $numero_compra);
    $guardar_compra->bindParam('fecha_compra', $fecha_compra);
    $guardar_compra->bindParam('comprobante', $comprobante);
    $guardar_compra->bindParam('id_proveedor', $id_proveedor);
    $guardar_compra->bindParam('id_usuario', $id_usuario);
    $guardar_compra->bindParam('precio_compra', $precio_compra_total);
    $guardar_compra->bindParam('cantidad', $cantidad_de_la_compra);
    $guardar_compra->bindParam('fyh_creacion', $fecha_hora);


 if ($guardar_compra->execute()){


    //para actualizar el stock

    $actualizar = $pdo->prepare("UPDATE productos SET stock = :stock WHERE id_producto = :id_producto");
    $actualizar->bindParam('stock', $stock_total);
    $actualizar->bindParam('id_producto', $id_producto);
    $actualizar->execute();

    $pdo->commit();

        session_start();
           $_SESSION ['mensaje'] = "Compra creada correctamente";
           $_SESSION ['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/compras/";
    </script>
    <?php
   
    }else{

    $pdo->rollBack();
    
        session_start();
           $_SESSION ['mensaje'] = "No se ha podido crear la compra";
           $_SESSION ['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/compras/crear_compra.php";
    </script>
    <?php
    } 
    

?>