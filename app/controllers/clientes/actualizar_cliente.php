<?php
include ('../../config.php');

$id_cliente = $_GET['id_cliente'];
$nombre_cliente = $_GET['nombre_cliente'];
$nit_di_cliente = $_GET['nit_di_cliente'];
$celular_cliente = $_GET['celular_cliente'];
$correo_cliente = $_GET['correo_cliente'];

  $actualizar_cliente = $pdo->prepare("UPDATE clientes SET nombre_cliente = :nombre_cliente, nit_di_cliente = :nit_di_cliente, celular_cliente = :celular_cliente, 
                                                             correo_cliente = :correo_cliente, fyh_actualizacion = :fyh_actualizacion
                                      WHERE id_cliente = :id_cliente");
    $actualizar_cliente->bindParam('nombre_cliente', $nombre_cliente);
    $actualizar_cliente->bindParam('nit_di_cliente', $nit_di_cliente);
    $actualizar_cliente->bindParam('celular_cliente', $celular_cliente);
    $actualizar_cliente->bindParam('correo_cliente', $correo_cliente);
    $actualizar_cliente->bindParam('fyh_actualizacion', $fecha_hora);  
    $actualizar_cliente->bindParam('id_cliente', $id_cliente);

    if ($actualizar_cliente->execute()){
        session_start();
           $_SESSION ['mensaje'] = "Cliente actualizado correctamente";
           $_SESSION ['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/clientes/";
    </script>
    <?php
   
    }else{
        session_start();
           $_SESSION ['mensaje'] = "No se ha podido actualizar el cliente";
           $_SESSION ['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/clientes/";
    </script>
    <?php
    }
    
?>