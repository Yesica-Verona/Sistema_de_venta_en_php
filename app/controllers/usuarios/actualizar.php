<?php
include('../../config.php');
$nombres = $_POST ['nombres'];
$email = $_POST ['email'];
$rol = $_POST ['rol'];
$password_usuario = $_POST ['password_usuario'];
$password_usuario_repeated = $_POST ['password_usuario_repeated'];
$id_usuario = $_POST ['id_usuario'];

if ($password_usuario == ''){

if ($password_usuario == $password_usuario_repeated){
    $password_usuario = password_hash($password_usuario, PASSWORD_DEFAULT);
   
    $guardar_usuario = $pdo->prepare("UPDATE usuarios 
    SET nombres = :nombres,
    email = :email,
    id_rol = :id_rol,
    f_h_actualizacion = :f_h_actualizacion, 
    WHERE id_usuario = :id_usuario");
    $guardar_usuario->bindParam('nombres', $nombres);
    $guardar_usuario->bindParam('email', $email);
    $guardar_usuario->bindParam('id_rol', $rol);
    $guardar_usuario->bindParam('f_h_actualizacion', $fecha_hora);
    $guardar_usuario->bindParam('id_usuario', $id_usuario);
    $guardar_usuario->execute();
    session_start();
    $_SESSION ['mensaje'] = "Usuario actualizado correctamente";
    $_SESSION ['icono'] = "success";
    header('Location:' .$URL. 'usuarios');
   }else{
       session_start();
       $_SESSION ['mensaje'] = "Las contraseñas no coinciden";
       $_SESSION ['icono'] = "error";
       header('Location:' .$URL. 'usuarios/editar_info_usuario.php?id=' . $id_usuario);
    }

}else{

if ($password_usuario == $password_usuario_repeated){
    $password_usuario = password_hash($password_usuario, PASSWORD_DEFAULT);
   
    $guardar_usuario = $pdo->prepare("UPDATE usuarios SET nombres = :nombres, email = :email, id_rol = :id_rol, password_usuario = :password_usuario, f_h_actualizacion = :f_h_actualizacion
                                     WHERE id_usuario = :id_usuario");
    $guardar_usuario->bindParam('nombres', $nombres);
    $guardar_usuario->bindParam('email', $email);
    $guardar_usuario->bindParam('id_rol', $rol);
    $guardar_usuario->bindParam('password_usuario', $password_usuario);
    $guardar_usuario->bindParam('f_h_actualizacion', $fecha_hora);
    $guardar_usuario->bindParam('id_usuario', $id_usuario);
    $guardar_usuario->execute();
    session_start();
    $_SESSION ['mensaje'] = "Usuario actualizado correctamente";
    $_SESSION ['icono'] = "success";
    header('Location:' .$URL. 'usuarios');
   }else{
       session_start();
       $_SESSION ['mensaje'] = "Las contraseñas no coinciden";
       $_SESSION ['icono'] = "error";
       header('Location:' .$URL. 'usuarios/editar_info_usuario.php?id=' . $id_usuario);
    }

}
?>