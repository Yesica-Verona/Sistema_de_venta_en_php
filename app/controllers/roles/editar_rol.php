<?php

$id_rol_get = $_GET ['id'];

$sql_roles= "SELECT * FROM roles WHERE id_rol = '$id_rol_get'";
$query_roles= $pdo->prepare($sql_roles);
$query_roles->execute();
$tabla_roles =$query_roles->fetchAll( PDO:: FETCH_ASSOC);

foreach($tabla_roles as $tabla_rol){
       $rol = $tabla_rol['rol'];
}
?>