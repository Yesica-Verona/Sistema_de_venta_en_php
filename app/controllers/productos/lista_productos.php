<?php
$sql_productos= "SELECT *, cat.nombre_categoria as nombre_categoria, used.email as email
                FROM productos as pro INNER JOIN categorias as cat ON pro.id_categoria = cat.id_categoria
                INNER JOIN usuarios as used ON used.id_usuario = pro.id_usuario";
$query_productos= $pdo->prepare($sql_productos);
$query_productos->execute();
$tabla_productos =$query_productos->fetchAll( PDO:: FETCH_ASSOC);
?>