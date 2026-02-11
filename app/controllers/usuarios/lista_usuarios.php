<?php
$sql_usuarios= "SELECT used.id_usuario as id_usuario, used.nombres as nombres, used.email as email, rol.rol as rol 
                FROM usuarios as used INNER JOIN roles as rol ON used.id_rol = rol.id_rol";
$query_usuarios= $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$tabla_usuarios =$query_usuarios->fetchAll( PDO:: FETCH_ASSOC);
?>