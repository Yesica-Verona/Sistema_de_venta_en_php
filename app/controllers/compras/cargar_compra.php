<?php
$id_compra_get = $_GET['id'];

$sql_compras= "SELECT *, com.precio_compra as precio_compra, pro.codigo as codigo, pro.nombre as nombre_producto, pro.descripcion as descripcion, pro.stock as stock, pro.stock_minimo as stock_minimo, 
               pro.stock_maximo as stock_maximo, pro.precio_compra as precio_compra_producto, pro.precio_venta as precio_venta_producto, pro.fecha_ingreso as fecha_ingreso, pro.imagen as imagen,
               cat.nombre_categoria as nombre_categoria, us.nombres as nombre_usuario_producto, prov.nombre_proveedor as nombre_proveedor, prov.celular as celular_proveedor,
               prov.telefono_empresa as telefono_empresa, prov.empresa as empresa, prov.email as email_proveedor, prov.direccion as direccion_proveedor, us.nombres as nombre_usuario
               FROM compras as com 
               INNER JOIN productos as pro ON com.id_producto = pro.id_producto 
               INNER JOIN categorias as cat ON cat.id_categoria = pro.id_categoria
               INNER JOIN usuarios as us ON com.id_usuario = us.id_usuario 
               INNER JOIN proveedores as prov ON com.id_proveedor = prov.id_proveedor WHERE com.id_compra = '$id_compra_get' ";
$query_compras= $pdo->prepare($sql_compras);
$query_compras->execute();
$tabla_compras =$query_compras->fetchAll( PDO:: FETCH_ASSOC);

foreach ($tabla_compras as $tabla_compra){
  $id_compra = $tabla_compra['id_compra'];
  $id_producto_tabla = $tabla_compra['id_producto'];
  $id_proveedor_tabla = $tabla_compra['id_proveedor'];
  $numero_compra = $tabla_compra['numero_compra']; 
  $codigo = $tabla_compra['codigo'];
  $nombre_categoria = $tabla_compra['nombre_categoria'];
  $nombre_producto = $tabla_compra['nombre_producto'];
  $nombre_usuario = $tabla_compra['nombre_usuario'];
  $descripcion = $tabla_compra['descripcion'];
  $stock = $tabla_compra['stock'];
  $stock_minimo = $tabla_compra['stock_minimo'];
  $stock_maximo = $tabla_compra['stock_maximo'];
  $precio_compra_producto = $tabla_compra['precio_compra_producto'];
  $precio_venta_producto = $tabla_compra['precio_venta_producto'];
  $fecha_ingreso = $tabla_compra['fecha_ingreso'];
  $imagen = $tabla_compra['imagen'];
  $nombre_proveedor_tabla = $tabla_compra['nombre_proveedor'];
  $celular = $tabla_compra['celular_proveedor'];
  $telefono_empresa = $tabla_compra['telefono_empresa'];
  $empresa = $tabla_compra['empresa'];
  $email_proveedor = $tabla_compra['email_proveedor'];
  $direccion = $tabla_compra['direccion'];
  $fecha_compra = $tabla_compra['fecha_compra'];
  $comprobante = $tabla_compra['comprobante'];
  $precio_compra = $tabla_compra['precio_compra'];
  $cantidad = $tabla_compra['cantidad'];
}
?>