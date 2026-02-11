<?php
include ('../../config.php');

$nombre_proveedor =$_GET['nombre_proveedor'];
$celular =$_GET['celular'];
$telefono_empresa =$_GET['telefono_empresa'];
$empresa =$_GET['empresa'];
$email =$_GET['email'];
$direccion =$_GET['direccion'];

  $guardar_proveedor = $pdo->prepare("INSERT INTO proveedores (nombre_proveedor, celular, telefono_empresa, empresa, email, direccion, fyh_creacion) 
                                                    VALUES (:nombre_proveedor, :celular, :telefono_empresa, :empresa, :email, :direccion, :fyh_creacion)");
    $guardar_proveedor->bindParam('nombre_proveedor', $nombre_proveedor);
    $guardar_proveedor->bindParam('celular', $celular);
    $guardar_proveedor->bindParam('telefono_empresa', $telefono_empresa);
    $guardar_proveedor->bindParam('empresa', $empresa);
    $guardar_proveedor->bindParam('email', $email);
    $guardar_proveedor->bindParam('direccion', $direccion);
    $guardar_proveedor->bindParam('fyh_creacion', $fecha_hora);

    if ($guardar_proveedor->execute()){
        session_start();
           $_SESSION ['mensaje'] = "Proveedor creado correctamente";
           $_SESSION ['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/proveedores/";
    </script>
    <?php
   
    }else{
        session_start();
           $_SESSION ['mensaje'] = "No se ha podido crear el proveedor";
           $_SESSION ['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/proveedores/";
    </script>
    <?php
    }
    
?>