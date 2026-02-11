<?php
include('../../config.php');
$nro_venta = $_GET['nro_venta'];
$id_producto = $_GET ['id_producto'];
$cantidad_venta = $_GET ['cantidad_venta'];
$stock_total = $_GET ['stock_total'];


    $carrito = $pdo->prepare("INSERT INTO carrito (nro_venta, id_producto, cantidad, fyh_creacion) 
                                                  VALUES (:nro_venta, :id_producto, :cantidad, :fyh_creacion)");
    
    $carrito->bindParam('nro_venta', $nro_venta);
    $carrito->bindParam('id_producto', $id_producto);
    $carrito->bindParam('cantidad',  $cantidad_venta);
    $carrito->bindParam('fyh_creacion', $fecha_hora);

 if ($carrito->execute()){
     //stock

    $actualizar = $pdo->prepare("UPDATE productos SET stock = :stock WHERE id_producto = :id_producto");
    $actualizar->bindParam('stock', $stock_total);
    $actualizar->bindParam('id_producto', $id_producto);
    $actualizar->execute();
    
    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/crear_venta.php";
    </script>
    <?php
   
    }else{
  
        session_start();
           $_SESSION ['mensaje'] = "No se ha podido enviar al carrito";
           $_SESSION ['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/crear_venta.php";
    </script>
    <?php
    } 
    

?>