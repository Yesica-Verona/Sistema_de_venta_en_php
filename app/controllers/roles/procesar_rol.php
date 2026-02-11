<?php
include('../../config.php');

$rol = $_POST ['rol'];

   
    $guardar_rol = $pdo->prepare("INSERT INTO roles (rol, f_h_creacion) VALUES (:rol, :f_h_creacion)");
    $guardar_rol->bindParam('rol', $rol);
    $guardar_rol->bindParam('f_h_creacion', $fecha_hora);
    if ($guardar_rol->execute()){
        session_start();
           $_SESSION ['mensaje'] = "Rol creado correctamente";
           $_SESSION ['icono'] = "success";
        header('Location:' .$URL. 'roles');
   
    }else{
        session_start();
           $_SESSION ['mensaje'] = "No se ha podido crear el rol";
           $_SESSION ['icono'] = "error";
       header('Location:' .$URL. 'roles/crear_rol.php');
    

    }
    
?>