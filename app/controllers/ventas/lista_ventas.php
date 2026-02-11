<?php
$sql_ventas= "SELECT *, cli.nombre_cliente as nombre_cliente, us.nombres as usuario_realiza_venta
             FROM ventas as ven 
             INNER JOIN clientes as cli ON ven.id_cliente = cli.id_cliente
             INNER JOIN usuarios as us ON ven.id_usuario = us.id_usuario ";
$query_ventas= $pdo->prepare($sql_ventas);
$query_ventas->execute();
$tabla_ventas =$query_ventas->fetchAll( PDO:: FETCH_ASSOC);
?>