<?php
include('../../config.php');

$nro_venta = $_GET ['nro_venta'];
$id_cliente = $_GET ['id_cliente'];
$precio_total = $_GET ['precio_total'];
$id_usuario = $_GET ['id_usuario'];

$pdo->beginTransaction();


    $guardar_venta = $pdo->prepare("INSERT INTO ventas (nro_venta, id_cliente, valor_total, id_usuario, fyh_creacion) 
                                                     VALUES (:nro_venta, :id_cliente, :valor_total, :id_usuario, :fyh_creacion)");
    
    
    $guardar_venta->bindParam('nro_venta', $nro_venta);
    $guardar_venta->bindParam('id_cliente',  $id_cliente);
    $guardar_venta->bindParam('valor_total', $precio_total);
    $guardar_venta->bindParam('id_usuario', $id_usuario);
    $guardar_venta->bindParam('fyh_creacion', $fecha_hora);


 if ($guardar_venta->execute()){

     $pdo->commit();
        
    echo "OK";
   
    }else{

    $pdo->rollBack();
    
        echo "error";
    } 
    

?>