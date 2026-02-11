<?php
define("SERVIDOR", "localhost:3309");
define("PUERTO", "3309");
define("USUARIO", "root");
define("PASSWORD", "");
define("BD", "sistema_de_ventas");

$servidor = "mysql:host=localhost;port=3309;dbname=sistema_de_ventas";
try {
    // instancia PDO para la conexión
    $pdo = new PDO($servidor, USUARIO, PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
   // echo "Conectado correctamente";
} catch (PDOException $e) {
    // Capturar y mostrar errores de conexión
    echo "error: " . $e->getMessage();
}
$URL = "http://localhost/WWW.SISTEMA_VENTA.COM/";
date_default_timezone_set('America/Bogota');
$fecha_hora = date('Y-m-d H:i:s');

