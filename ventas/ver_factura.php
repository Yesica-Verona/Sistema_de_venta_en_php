<?php
include('../app/config.php');

$nro_venta = $_GET['nro_venta'];

$sql = "SELECT ruta_factura FROM ventas WHERE nro_venta = :nro_venta";
$sentencia = $pdo->prepare($sql);
$sentencia->execute([':nro_venta' => $nro_venta]);
$venta = $sentencia->fetch(PDO::FETCH_ASSOC);

if ($venta && !empty($venta['ruta_factura'])) {
?>
    <iframe 
        src="<?= '../' . $venta['ruta_factura']; ?>" 
        width="100%" 
        height="700px"
        style="border:none">
    </iframe>
<?php
} else {
    echo "La Factura no ha sido encontrada.";
}
?>