<?php
include('../../config.php');

$codigo = $_POST ['codigo'];
$id_categoria = $_POST ['id_categoria'];
$nombre = $_POST ['nombre'];
$id_usuario = $_POST ['id_usuario'];
$descripcion = $_POST ['descripcion'];
$stock = $_POST ['stock'];
$stock_minimo = $_POST ['stock_minimo'];
$stock_maximo = $_POST ['stock_maximo'];
$precio_compra = $_POST ['precio_compra'];
$precio_venta = $_POST ['precio_venta'];
$fecha_ingreso = $_POST ['fecha_ingreso'];

$imagen = $_POST ['imagen'];

$nombreDelArchivo = date("Y-m-d-h-i-s");
$filename = $nombreDelArchivo. "__".$_FILES['imagen']['name'];
$location = "../../../productos/img_productos/".$filename;

move_uploaded_file($_FILES['imagen']['tmp_name'],$location);

    $guardar_producto = $pdo->prepare("INSERT INTO productos (codigo, nombre, descripcion, stock, stock_minimo, stock_maximo, precio_compra, precio_venta, fecha_ingreso, imagen, id_usuario, id_categoria, fyh_registro) 
                                                     VALUES (:codigo, :nombre, :descripcion, :stock, :stock_minimo, :stock_maximo, :precio_compra, :precio_venta, :fecha_ingreso, :imagen, :id_usuario, :id_categoria, :fyh_registro)");
    
    
    $guardar_producto->bindParam('codigo', $codigo);
    $guardar_producto->bindParam('nombre',  $nombre);
    $guardar_producto->bindParam('descripcion', $descripcion);
    $guardar_producto->bindParam('stock', $stock);
    $guardar_producto->bindParam('stock_minimo', $stock_minimo);
    $guardar_producto->bindParam('stock_maximo', $stock_maximo);
    $guardar_producto->bindParam('precio_compra', $precio_compra);
    $guardar_producto->bindParam('precio_venta', $precio_venta);
    $guardar_producto->bindParam('fecha_ingreso',  $fecha_ingreso);
    $guardar_producto->bindParam('imagen',  $filename);
    $guardar_producto->bindParam('id_usuario', $id_usuario);
    $guardar_producto->bindParam('id_categoria',  $id_categoria);
    $guardar_producto->bindParam('fyh_registro', $fecha_hora);

    if ($guardar_producto->execute()){
        session_start();
           $_SESSION ['mensaje'] = "Producto creado correctamente";
           $_SESSION ['icono'] = "success";
        header('Location:' .$URL. '/productos');
   
    }else{
        session_start();
           $_SESSION ['mensaje'] = "No se ha podido crear el Producto";
           $_SESSION ['icono'] = "error";
       header('Location:' .$URL. '/productos/crear_producto.php');
    

    }
    
?>