<?php
include('../../config.php');
$id_producto =  $_POST ['id_producto'];
$codigo = $_POST ['codigo'];
$nombre = $_POST ['nombre'];
$descripcion = $_POST ['descripcion'];
$stock = $_POST ['stock'];
$stock_minimo = $_POST ['stock_minimo'];
$stock_maximo = $_POST ['stock_maximo'];
$precio_compra = $_POST ['precio_compra'];
$precio_venta = $_POST ['precio_venta'];
$fecha_ingreso = $_POST ['fecha_ingreso'];
$id_categoria = $_POST ['id_categoria'];
$id_usuario = $_POST ['id_usuario'];

$imagen_text = $_POST ['imagen_text'];

if($_FILES['imagen']['name'] != null){
    
    $nombreDelArchivo = date("Y-m-d-h-i-s");
    $imagen_text = $nombreDelArchivo. "__".$_FILES['imagen']['name'];
    $location = "../../../productos/img_productos/".$imagen_text;

move_uploaded_file($_FILES['imagen']['tmp_name'],$location);

}else{
   
}

$actualizar_producto = $pdo->prepare("UPDATE productos SET nombre = :nombre, descripcion = :descripcion, stock = :stock, stock_minimo = :stock_minimo,
                                                      stock_maximo = :stock_maximo, precio_compra = :precio_compra, precio_venta = :precio_venta,
                                                      fecha_ingreso = :fecha_ingreso, imagen = :imagen, id_categoria = :id_categoria,
                                                      id_usuario = :id_usuario, fyh_actualizacion = :fyh_actualizacion
                                 WHERE id_producto = :id_producto");
$actualizar_producto->bindParam('nombre', $nombre);
$actualizar_producto->bindParam('descripcion', $descripcion);
$actualizar_producto->bindParam('stock', $stock);
$actualizar_producto->bindParam('stock_minimo', $stock_minimo);
$actualizar_producto->bindParam('stock_maximo', $stock_maximo);
$actualizar_producto->bindParam('precio_compra', $precio_compra);
$actualizar_producto->bindParam('precio_venta', $precio_venta);
$actualizar_producto->bindParam('fecha_ingreso', $fecha_ingreso);
$actualizar_producto->bindParam('imagen', $imagen_text);
$actualizar_producto->bindParam('id_categoria', $id_categoria);
$actualizar_producto->bindParam('id_usuario', $id_usuario);
$actualizar_producto->bindParam('fyh_actualizacion', $fecha_hora);
$actualizar_producto->bindParam('id_producto', $id_producto);


  if($actualizar_producto->execute()){
     session_start();
       $_SESSION ['mensaje'] = "El Producto ha sido actualizado correctamente";
       $_SESSION ['icono'] = "success";
    header('Location:' .$URL. 'productos');
  }else{
     session_start();
       $_SESSION ['mensaje'] = "No se ha podido actualizar el Producto";
       $_SESSION ['icono'] = "error";
       header('Location:' .$URL. 'productos/editar_info_producto.php?id=' . $id_producto);
  }
?>