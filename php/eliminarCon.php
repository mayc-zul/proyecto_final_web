<?php

include_once 'conexionDB.php';

$id = $_GET["id"];

$sql_eliminar = 'DELETE FROM consolas WHERE id=?';
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar->execute(array($id));
header('location:./consolas.php');