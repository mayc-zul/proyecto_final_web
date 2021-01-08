<?php

include_once 'conexionDB.php';

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$precio = $_POST["precio"];
$descripcion = $_POST["descripcion"];
echo("/nid: ".$id." nombre: ".$nombre." descripcion: ".$descripcion);
$imagen = file_get_contents($_FILES["imagen"]["tmp_name"]);

$sql_editar = "UPDATE celulares SET nombre=?,precio=?,descripcion=?,imagen=? WHERE id=?";
$sentencia_editar = $pdo->prepare($sql_editar);
$sentencia_editar->execute(array($nombre,$precio,$descripcion,$imagen,$id));

header('location:./celulares.php');

