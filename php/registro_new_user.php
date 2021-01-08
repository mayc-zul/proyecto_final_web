<?php
include_once './conexionDB.php';

//Captura de datos por post
$usuario_nuevo = $_POST['name'];
$data = $_POST['birthday'];
$phone = $_POST['phone'];
$email = $_POST['mail'];
$pass = $_POST['password'];
$recibir = $_POST['recibir'];


//verificar si el usuario existe
$sql = 'SELECT * FROM usuarios WHERE nombre = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($usuario_nuevo));
$resultado = $sentencia->fetch();

if (isset($recibir)) {
    $recibir = 1;
}else{
    $recibir = 0;
}


if ($resultado) {
    echo '<script>alert("Ya existe este usurario, intente ingresar otro.")</script>';
    die();
}

$pass = password_hash($pass, PASSWORD_DEFAULT);

$sql_agregar = 'INSERT INTO usuarios (nombre, fecha_nacimiento, telefono, correo, password, resibir, tipo_usuario) VALUE (?,?,?,?,?,?,?)';
$sentencia_agregar = $pdo -> prepare($sql_agregar);

if ($sentencia_agregar->execute(array($usuario_nuevo,$data,$phone,$email,$pass,$recibir,'cliente'))) {
    //Agregado
    $_SESSION['user'] = $usuario_nuevo;
    $_SESSION['tipo_usuario'] = 'cliente';
    header('Location: ./restringido.php');
}else{
    echo '<script>alert("No se logro conectar con la base de datos.")</script>';
}

//cerramos conexión base de datos y sentencia
$sentencia_agregar = null;
$pdo = null;

?>