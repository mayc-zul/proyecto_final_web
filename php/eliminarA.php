<?php

include_once 'conexionDB.php';

$id = $_GET["id"];

$sql_eliminar = 'DELETE FROM audiovideo WHERE id=?';
$sentencia_eliminar = $pdo->prepare($sql_eliminar);
$sentencia_eliminar->execute(array($id));
header('location:./audiovideo.php');