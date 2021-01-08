<?php

include_once 'conexionDB.php';

$id = $_GET["id"];

$sql_eliminar = 'DELETE FROM televisores WHERE id=?';
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar->execute(array($id));
header('location:./televisores.php');