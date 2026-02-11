<?php
include('../../config.php');

$id_rol = $_POST ['id_rol'];
$rol = $_POST ['rol'];

$actualizar_rol = $pdo->prepare("UPDATE roles SET rol = :rol, f_h_actualizacion = :f_h_actualizacion
                                     WHERE id_rol = :id_rol");
$actualizar_rol->bindParam('rol', $rol);
$actualizar_rol->bindParam('f_h_actualizacion', $fecha_hora);
$actualizar_rol->bindParam('id_rol', $id_rol);

  if($actualizar_rol->execute()){
     session_start();
       $_SESSION ['mensaje'] = "El Rol ha sido actualizado correctamente";
       $_SESSION ['icono'] = "success";
    header('Location:' .$URL. 'roles');
  }else{
     session_start();
       $_SESSION ['mensaje'] = "No se ha podido actualizar el Rol";
       $_SESSION ['icono'] = "error";
       header('Location:' .$URL. 'roles/editar_rol.php?id=' . $id_rol);
  }
?>