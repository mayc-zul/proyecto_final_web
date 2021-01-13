<?php

include_once 'conexionDB.php';

$id_existente = $_GET["id"];
//leer base de datos 
$sql_carrito = "SELECT * FROM carrito WHERE id=?";
$sentencia_carrito = $pdo->prepare($sql_carrito);
$sentencia_carrito ->execute(array($id_existente));
$resultado_carrito = $sentencia_carrito->fetch();

$count = $resultado_carrito['cantidad'] - 1;
$sql_editar = "UPDATE carrito SET cantidad=? WHERE id=?";
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar->execute(array($count,$id_existente));

header('location:./carrito.php');