<?php
$link = 'mysql:host=localhost;dbname=tecnocompras';
$usuario = 'root';
$pass = '';

try {
    
    $pdo = new PDO($link, $usuario, $pass); //conexión de la base de datos

    //echo 'Conectado';

    //foreach($pdo->query('SELECT * FROM `colores`') as $row) {
    //    print_r($row);
    //}
    //$pdo = null;


} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>