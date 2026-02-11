<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset ($_SESSION['session_email'])){

   $email_session =  ($_SESSION['session_email']);
   $sql= "SELECT used.id_usuario as id_usuario, used.nombres as nombres, used.email as email, rol.rol as rol 
                FROM usuarios as used INNER JOIN roles as rol ON used.id_rol = rol.id_rol WHERE email = '$email_session'";
   $query= $pdo->prepare($sql);
   $query->execute();
   $usuarios =$query->fetchAll( PDO:: FETCH_ASSOC);
     foreach($usuarios as $usuario){
             $id_usuario_session = $usuario ["id_usuario"];
             $session_nombres =$usuario ["nombres"];
             $session_rol =$usuario ["rol"];
          }
} else {
   echo "no existe";
   header('Location:' .$URL. 'login/index.php');
   exit;
}



// Permisos por rol
$permisos = [
    'ADMINISTRADOR' => ['*'], // todos los módulos
    'VENDEDOR' => ['modulo_ventas', 'modulo_clientes'], // solo dos módulos
    'BODEGUERO' => ['modulo_compras', 'modulo_productos'] // otros dos módulos
];

// Evitar redeclarar la función
if (!function_exists('tienePermiso')) {
    function tienePermiso($modulo) {
        global $permisos, $session_rol;
        // Administrador puede todo
        if ($permisos[$session_rol][0] == '*') return true;
        return in_array($modulo, $permisos[$session_rol]);
    }
}

?>