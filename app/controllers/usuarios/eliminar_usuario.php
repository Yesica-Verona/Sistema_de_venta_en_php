<?php
include('../../config.php');

$id_usuario = $_POST ['id_usuario'];

$eliminar_usuario = $pdo->prepare("DELETE FROM usuarios WHERE id_usuario = :id_usuario");
$eliminar_usuario->bindParam('id_usuario', $id_usuario);
$eliminar_usuario->execute();
    session_start();
    $_SESSION ['mensaje'] = "El usuario ha sido eliminado correctamente";
    $_SESSION ['icono'] = "success";
    header('Location:' .$URL. 'usuarios/');
?>