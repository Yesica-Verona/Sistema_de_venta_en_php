<?php
include('../../config.php');

$id_carrito = $_POST['id_carrito'];

$sentencia = $pdo->prepare("SELECT id_producto, cantidad FROM carrito WHERE id_carrito = :id_carrito");
$sentencia->bindParam(':id_carrito', $id_carrito);
$sentencia->execute();

$resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

if($resultado){
    $id_producto = $resultado['id_producto'];
    $cantidad_eliminada = $resultado['cantidad'];

    $actualizar_stock = $pdo->prepare("UPDATE productos SET stock = stock + :cantidad WHERE id_producto = :id_producto");
    $actualizar_stock->bindParam(':cantidad', $cantidad_eliminada);
    $actualizar_stock->bindParam(':id_producto', $id_producto);
    $actualizar_stock->execute();


    $eliminar_carrito = $pdo->prepare("DELETE FROM carrito WHERE id_carrito = :id_carrito");
    $eliminar_carrito->bindParam(':id_carrito', $id_carrito);


     if ($eliminar_carrito->execute()) {
        echo '<script>
                location.href = "' . $URL . '/ventas/crear_venta.php";
              </script>';
        exit;
    } else {
        echo '<script>
                alert("Error al eliminar del carrito");
                location.href = "' . $URL . '/ventas/crear_venta.php";
              </script>';
        exit;
    }
}  
?>