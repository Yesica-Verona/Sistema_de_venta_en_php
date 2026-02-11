<?php
include('../../config.php');

$id_producto = $_POST ['id_producto'];

$eliminar_producto = $pdo->prepare("DELETE FROM productos WHERE id_producto = :id_producto");
$eliminar_producto->bindParam('id_producto', $id_producto);
if($eliminar_producto->execute()){

    session_start();
    $_SESSION ['mensaje'] = "El producto ha sido eliminado correctamente";
    $_SESSION ['icono'] = "success";
    header('Location:' .$URL. 'productos/');
}else{
    session_start();
    $_SESSION ['mensaje'] = "No se ha podido eliminar el Producto";
    $_SESSION ['icono'] = "error";
    header('Location:' .$URL. 'productos/eliminar_info_producto.php?id=' . $id_producto);
}
?>