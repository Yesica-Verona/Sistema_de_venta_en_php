<?php
include ('../../config.php');

$nombre_cliente =$_GET['nombre_cliente'];
$nit_di_cliente =$_GET['nit_di_cliente'];
$celular_cliente =$_GET['celular_cliente'];
$correo_cliente =$_GET['correo_cliente'];

  $guardar_cliente = $pdo->prepare("INSERT INTO clientes (nombre_cliente, nit_di_cliente, celular_cliente, correo_cliente, fyh_creacion) 
                                                    VALUES (:nombre_cliente, :nit_di_cliente, :celular_cliente, :correo_cliente, :fyh_creacion)");
    $guardar_cliente->bindParam('nombre_cliente', $nombre_cliente);
    $guardar_cliente->bindParam('nit_di_cliente', $nit_di_cliente);
    $guardar_cliente->bindParam('celular_cliente', $celular_cliente);
    $guardar_cliente->bindParam('correo_cliente', $correo_cliente);
    $guardar_cliente->bindParam('fyh_creacion', $fecha_hora);

    if ($guardar_cliente->execute()){
        session_start();
           $_SESSION ['mensaje'] = "Cliente creado correctamente";
           $_SESSION ['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/clientes/";
    </script>
    <?php
   
    }else{
        session_start();
           $_SESSION ['mensaje'] = "No se ha podido crear el cliente";
           $_SESSION ['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/clientes/";
    </script>
    <?php
    }
    
?>