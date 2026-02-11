<?php
$id_producto_get = $_GET['id'];

$sql_productos= "SELECT *, cat.nombre_categoria as nombre_categoria, used.email as email, used.id_usuario as id_usuario
                FROM productos as pro INNER JOIN categorias as cat ON pro.id_categoria = cat.id_categoria
                INNER JOIN usuarios as used ON used.id_usuario = pro.id_usuario WHERE id_producto = $id_producto_get";
$query_productos= $pdo->prepare($sql_productos);
$query_productos->execute();
$tabla_productos =$query_productos->fetchAll( PDO:: FETCH_ASSOC);


foreach ($tabla_productos as $tabla_producto){

    $codigo = $tabla_producto ['codigo'];
    $nombre_categoria = $tabla_producto ['nombre_categoria'];
    $nombre = $tabla_producto ['nombre'];
    $email = $tabla_producto ['email'];
    $id_usuario = $tabla_producto ['id_usuario'];
    $descripcion = $tabla_producto ['descripcion'];
    $stock = $tabla_producto ['stock'];
    $stock_minimo = $tabla_producto ['stock_minimo'];
    $stock_maximo = $tabla_producto ['stock_maximo'];
    $precio_compra = $tabla_producto ['precio_compra'];
    $precio_venta = $tabla_producto ['precio_venta'];
    $fecha_ingreso = $tabla_producto ['fecha_ingreso'];
    $imagen = $tabla_producto ['imagen'];

}
?>