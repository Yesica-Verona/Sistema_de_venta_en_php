<?php
include ('../../config.php');

$email = $_POST['email'];
$password_usuario = $_POST['password_usuario'];

// Buscar usuario por email
$sql = "SELECT u.id_usuario, u.nombres, u.email, u.password_usuario, r.rol 
        FROM usuarios u 
        INNER JOIN roles r ON u.id_rol = r.id_rol 
        WHERE u.email = :email";

$query = $pdo->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$usuario = $query->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($password_usuario, $usuario['password_usuario'])) {
    // Datos correctos: iniciar sesión
    session_start();
    $_SESSION['session_email'] = $usuario['email'];
    $_SESSION['session_nombres'] = $usuario['nombres'];
    $_SESSION['session_rol'] = $usuario['rol'];
    $_SESSION['session_id'] = $usuario['id_usuario'];

    header('Location:' . $URL . 'index.php');
    exit;
} else {
    session_start();
    $_SESSION['mensaje'] = 'Error: Los datos ingresados son incorrectos';
    header('Location:' . $URL . 'login');
    exit;
}
?>
