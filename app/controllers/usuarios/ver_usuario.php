<?php
$id_usuario_get =$_GET['id'];

$sql_usuarios= "SELECT used.id_usuario as id_usuario, used.nombres as nombres, used.email as email, rol.rol as rol 
                FROM usuarios as used INNER JOIN roles as rol ON used.id_rol = rol.id_rol WHERE id_usuario = '$id_usuario_get'";
$query_usuarios= $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$tabla_usuarios =$query_usuarios->fetchAll( PDO:: FETCH_ASSOC);

foreach($tabla_usuarios as $tabla_usuario){
       $nombres = $tabla_usuario['nombres'];
       $email = $tabla_usuario['email'];
        $rol = $tabla_usuario['rol'];
}
?>