<?php
include('../../config.php');

$nombres = $_POST ['nombres'];
$email = $_POST ['email'];
$rol = $_POST ['rol'];
$password_usuario = $_POST ['password_usuario'];
$password_usuario_repeated = $_POST ['password_usuario_repeated'];

if ($password_usuario == $password_usuario_repeated){
    $password_usuario = password_hash($password_usuario, PASSWORD_DEFAULT);
   
    $guardar_usuario = $pdo->prepare("INSERT INTO usuarios (nombres, email, id_rol, password_usuario, f_h_creacion)  
                                  VALUES (:nombres, :email, :id_rol, :password_usuario, :f_h_creacion)");

    $guardar_usuario->bindParam('nombres', $nombres);
    $guardar_usuario->bindParam('email', $email);
    $guardar_usuario->bindParam('id_rol', $rol);
    $guardar_usuario->bindParam('password_usuario', $password_usuario);
    $guardar_usuario->bindParam('f_h_creacion', $fecha_hora);
    $guardar_usuario->execute();

    session_start();
       $_SESSION ['mensaje'] = "Usuario creado correctamente";
       $_SESSION ['icono'] = "success";
    header('Location:' .$URL. 'usuarios');
    
   }else{
     session_start();
        $_SESSION ['mensaje'] = "Las contraseñas no coinciden";
        $_SESSION ['icono'] = "error";
       header('Location:' .$URL. 'usuarios/crear_usuario.php');
       
    }
?>