<?php
$sql_roles= "SELECT * FROM roles";
$query_roles= $pdo->prepare($sql_roles);
$query_roles->execute();
$tabla_roles =$query_roles->fetchAll( PDO:: FETCH_ASSOC);
?>