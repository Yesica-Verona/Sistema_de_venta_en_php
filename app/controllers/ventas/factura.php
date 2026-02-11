<?php
require '../../../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

include('../../config.php');

$nro_venta = $_GET['nro_venta'];


// Datos de la venta
$guardar_venta = "SELECT ven.*, cli.nombre_cliente as nombre_cliente,  cli.nit_di_cliente as nit_di_cliente, us.nombres as usuario_realiza_venta, ven.fyh_creacion as fyh_creacion
              FROM ventas as ven
              INNER JOIN clientes as cli ON ven.id_cliente = cli.id_cliente
              INNER JOIN usuarios as us ON ven.id_usuario = us.id_usuario 
              WHERE ven.nro_venta = :nro_venta";

$sentencia = $pdo->prepare($guardar_venta);
$sentencia->execute([':nro_venta' => $nro_venta]);
$venta = $sentencia->fetch(PDO::FETCH_ASSOC);

//Productos vendidos
$guardar_detalle = "SELECT pro.nombre as nombre, pro.precio_venta as precio_venta, car.cantidad as cantidad
                FROM carrito as car
                INNER JOIN productos as pro ON car.id_producto = pro.id_producto
                WHERE car.nro_venta = :nro_venta";

$sentencia = $pdo->prepare($guardar_detalle);
$sentencia->execute([':nro_venta' => $nro_venta]);
$detalles = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//HTML de la factura
$html = "
<div style='text-align:center'>
      <h2 style='color: #1560EA'>Pets Friends</h2>
      <p>Nit: 601282736 - 2 </p>
      <p>Dirección: Monteria/Cordoba/Colombia</p>
</div>
<hr border='1'>

<b>Venta N°:</b> {$venta['nro_venta']} <br>
<b>Cliente:</b> {$venta['nombre_cliente']} <br>
<b>NIT/CC:</b> {$venta['nit_di_cliente']} <br>
<b>Usuario de Caja:</b> {$venta['usuario_realiza_venta']} <br>
<b>Fecha de facturación:</b> {$venta['fyh_creacion']} <br>
<br>
<br>
<table width='100%' border='1' cellspacing='0' cellpadding='5'>
<tr>
    <th style='color: #038510'>Producto</th>
    <th style='color: #038510'>Cantidad</th>
    <th style='color: #038510'>Precio</th>
    <th style='color: #038510'>Subtotal</th>
</tr>
";

$total = 0;
foreach ($detalles as $detalle) {
    $subtotal = $detalle['cantidad'] * $detalle['precio_venta'];
    $total += $subtotal;

    $html .= "
    <tr>
        <td>{$detalle['nombre']}</td>
        <td align='center'>{$detalle['cantidad']}</td>
        <td align='right'>{$detalle['precio_venta']}</td>
        <td align='right'>$subtotal</td>
    </tr>";
}

$html .= "
<tr>
    <td colspan='3' align='right' style='color: #038510'><b>Total</b></td>
    <td align='right' style='color: #038510'><b>$total</b></td>
</tr>
</table>
";

//Generamos el PDF

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Nombramos el archivo a guardar
$nombre_archivo = "Factura_$nro_venta.pdf";

// Ruta física real de la carpeta de archivos
$ruta_carpeta = __DIR__ . "/../../../ventas/facturas/";
if (!file_exists($ruta_carpeta)) {
    mkdir($ruta_carpeta, 0777, true);
}

$ruta_fisica = $ruta_carpeta . $nombre_archivo;

// Ruta que se guarda en la BD (para el navegador)
$ruta_bd = "ventas/facturas/$nombre_archivo";

file_put_contents($ruta_fisica, $dompdf->output());

// Guardar ruta en BD
$guardar_ruta = "UPDATE ventas SET ruta_factura = :ruta_factura WHERE nro_venta = :nro_venta";
$sentencia = $pdo->prepare($guardar_ruta);
$sentencia->execute([
    ':ruta_factura' => $ruta_bd,
    ':nro_venta'  => $nro_venta
]);

// Mostrar PDF
$dompdf->stream($nombre_archivo, ["Attachment" => false]);
?>