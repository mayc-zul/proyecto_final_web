<?php
session_start();
//Conexión base de datos
include_once './conexionDB.php';
$usuraio_login = $_POST['user'];
$contrasena_login = $_POST['password'];

//verificar si el usuario existe
$sql = 'SELECT * FROM usuarios WHERE nombre = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($usuraio_login));
$resultado = $sentencia->fetch();


if (!$resultado) {
    echo '<script>alert("El usuario que no existe.")</script>';
    die();
}
if (password_verify($contrasena_login, $resultado['password'])) {
    //Las contraseña son iguales
    $_SESSION['user'] = $usuraio_login;
    $_SESSION['tipo_usuario'] = $resultado['tipo_usuario'];
    header('Location: ./restringido.php');
}else{
    //Las contraseñas no son iguales
    echo '<script>alert("La contraseña que se ingreso no corresponde es incorrecta.")</script>';
    die();
}
?>