<?php
session_start();

if (isset($_SESSION['user'])) {
    if($_SESSION['tipo_usuario'] == 'administrador'){
        //echo '<h1>Benvenido administrador '.$_SESSION['user'].' </h1>';
        //echo '<br><a href="./audiovideo.php">Cerrar Sesión</a>';
        header('Location: ../index.php');
       

    }elseif($_SESSION['tipo_usuario'] == 'cliente'){
        //echo '<h1>Benvenido cliente '.$_SESSION['user'].' </h1>';
        //echo '<br><a href="cerrar.php">Cerrar Sesión</a>';
        header('Location: ../index.php');
    }

}else{
    header('Location: ../index.php');
}

?>