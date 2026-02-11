<?php
include ('../../config.php');

$id_proveedor = $_GET['id_proveedor'];
$nombre_proveedor = $_GET['nombre_proveedor'];
$celular = $_GET['celular'];
$telefono_empresa = $_GET['telefono_empresa'];
$empresa = $_GET['empresa'];
$email = $_GET['email'];
$direccion = $_GET['direccion'];

  $actualizar_proveedor = $pdo->prepare("UPDATE proveedores SET nombre_proveedor = :nombre_proveedor, celular = :celular, telefono_empresa = :telefono_empresa, 
                                                             empresa = :empresa, email = :email, direccion = :direccion, fyh_actualizacion = :fyh_actualizacion
                                      WHERE id_proveedor = :id_proveedor");
    $actualizar_proveedor->bindParam('nombre_proveedor', $nombre_proveedor);
    $actualizar_proveedor->bindParam('celular', $celular);
    $actualizar_proveedor->bindParam('telefono_empresa', $telefono_empresa);
    $actualizar_proveedor->bindParam('empresa', $empresa);
    $actualizar_proveedor->bindParam('email', $email);
    $actualizar_proveedor->bindParam('direccion', $direccion);
    $actualizar_proveedor->bindParam('fyh_actualizacion', $fecha_hora);  
    $actualizar_proveedor->bindParam('id_proveedor', $id_proveedor);

    if ($actualizar_proveedor->execute()){
        session_start();
           $_SESSION ['mensaje'] = "Proveedor actualizado correctamente";
           $_SESSION ['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/proveedores/";
    </script>
    <?php
   
    }else{
        session_start();
           $_SESSION ['mensaje'] = "No se ha podido actualizar el proveedor";
           $_SESSION ['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/proveedores/";
    </script>
    <?php
    }
    
?>