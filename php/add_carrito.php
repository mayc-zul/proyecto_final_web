<?php
session_start();
include_once './conexionDB.php';

//Variables para la base de dato del carrito
$categoria = $_GET['categoria'];
$id_producto = $_SESSION['id_producto'];
$cantidad = 1;

$sql_carrito = "SELECT * FROM carrito WHERE categoria=?";
$sentencia_carrito = $pdo->prepare($sql_carrito);
$sentencia_carrito ->execute(array($categoria));
$resultado_carrito = $sentencia_carrito->fetchAll();
$row = $sentencia_carrito->rowCount();
$repetir = 0;
$existe = false;
$id_existente= null;
$count = 0;
//Sentencia para saber si un usiario inicio sesión

if($row != 0){
    for ($i=0; $i < $row; $i++) { 
        if (!in_array($id_producto,$resultado_carrito[$i])) {
            $repetir += 1;
        }else{
            $existe = true;
            $id_existente = $resultado_carrito[$i]['id'];
            $count = $resultado_carrito[$i]['cantidad'] + 1;
            
        }
    }
}else{
    if (!isset($_SESSION['user'])) {
        $id_usuario = 0;
        $sql_agregar = "INSERT INTO carrito (id_usuario,categoria,id_producto,cantidad) VALUES (?,?,?,?)";
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->execute(array($id_usuario,$categoria,$id_producto,$cantidad));
        echo 'Ningun usuario hay iniciado sesión<br>';
    }else{
        $id_usuario = $_SESSION['id_usuario'];
        $sql_agregar = "INSERT INTO carrito (id_usuario,categoria,id_producto,cantidad) VALUES (?,?,?,?)";
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->execute(array($id_usuario,$categoria,$id_producto,$cantidad));
        echo 'Han iniciado sesión <br>';
    }
}

if ($repetir > 0 && $existe == false) {
    if (!isset($_SESSION['user'])) {
        $id_usuario = 0;
        $sql_agregar = "INSERT INTO carrito (id_usuario,categoria,id_producto,cantidad) VALUES (?,?,?,?)";
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->execute(array($id_usuario,$categoria,$id_producto,$cantidad));
        echo 'Ningun usuario hay iniciado sesión<br>';
    }else{
        $id_usuario = $_SESSION['id_usuario'];
        $sql_agregar = "INSERT INTO carrito (id_usuario,categoria,id_producto,cantidad) VALUES (?,?,?,?)";
        $sentencia_agregar = $pdo->prepare($sql_agregar);
        $sentencia_agregar->execute(array($id_usuario,$categoria,$id_producto,$cantidad));
        echo 'Han iniciado sesión <br>';
    }
}

if ($existe == true) { 
    $sql_editar = "UPDATE carrito SET cantidad=? WHERE id=?";
    $sentencia_editar = $pdo->prepare($sql_editar);
    $sentencia_editar->execute(array($count,$id_existente));
}

header('location:./carrito.php');

