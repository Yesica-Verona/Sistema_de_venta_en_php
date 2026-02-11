<?php
$sql_compras= "SELECT *, pro.codigo as codigo, pro.nombre as nombre_producto, pro.descripcion as descripcion, pro.stock as stock, pro.stock_minimo as stock_minimo, 
               pro.stock_maximo as stock_maximo, pro.precio_compra as precio_compra_producto, pro.precio_venta as precio_venta_producto, pro.fecha_ingreso as fecha_ingreso, pro.imagen as imagen,
               cat.nombre_categoria as nombre_categoria, us.nombres as nombre_usuario_producto, prov.nombre_proveedor as nombre_proveedor, prov.celular as celular_proveedor,
               prov.telefono_empresa as telefono_empresa, prov.empresa as empresa, prov.email as email_proveedor, prov.direccion as direccion_proveedor, us.nombres as nombre_usuario
               FROM compras as com 
               INNER JOIN productos as pro ON com.id_producto = pro.id_producto 
               INNER JOIN categorias as cat ON cat.id_categoria = pro.id_categoria
               INNER JOIN usuarios as us ON com.id_usuario = us.id_usuario 
               INNER JOIN proveedores as prov ON com.id_proveedor = prov.id_proveedor";
$query_compras= $pdo->prepare($sql_compras);
$query_compras->execute();
$tabla_compras =$query_compras->fetchAll( PDO:: FETCH_ASSOC);
?>