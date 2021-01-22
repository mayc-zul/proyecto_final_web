<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Virtual Shop</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/estilo.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="./js/verificacion.js"></script> -->
    <script>
        window.onload = function(){
        //Obtener formulario y los elementos de este
        var login_form = document.login_form.elements;
        var regist_form = document.regist_form.elements;
        //var add_product = document.add_product.elements;
        //var edit_product = document.edit_product.elements;
        
        login_form[0].onkeypress = permitir;
        login_form[1].onkeypress = permitir;
        
        regist_form[0].onkeypress = permitir;
        regist_form[4].onkeypress = permitir;
        
        //add_product[1].onkeypress = permitir_p;
        //edit_product[1].onkeypress = permitir_p;
        }

        function permitir(event){
            switch(this.type){
                case "text": 
                    p = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ 1234567890"
                    break;
                case "password":
                    p = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
                    break;
            }

            var cod = event.charCode;
            var letra = String.fromCharCode(cod);
            return p.indexOf(letra) != -1;
        }

        function permitir_p(event){
            p = "1234567890,$"
            var cod = event.charCode;
            var letra = String.fromCharCode(cod);
            return p.indexOf(letra) != -1;
        }
    </script>
    
    <!--iconos-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!--Programa para el mapa-->
    <script text="text/javascript" src="./js/mapa.js"></script> 

    <!--API Google maps-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBfX4lowanRbhWaQ_8tPQ2OT1tmBj_JU3I" async defer></script>

    <style type="text/css">
            #mapa{
                width: 100%;
                height: 80%;
            }

            html, body{
                height: 100%;
                margin: 0;
                padding: 0;
            }

    </style>

 
</head>
<body>

	<!-- Barra de navegacion -->

	<div id="carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <h4 class="d-block1 w-100">Envío gratis por compras superiores a $150</h4>
          </div>
          <div class="carousel-item">
            <h4 class="d-block1 w-100">Más del 25% de descuento en cursos de programación</h4>
          </div>
        </div>
    </div>

    <div class="navbar navbar-expand-lg navbar-dark bg-dark fixed">
    	<div class="col-3">
	    	<a href="#" class="navbar-brand"><h1><b>TecnoCompras</b></h1></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 col-lg-7 col-sm-12">
    		    <input class="form-control mr-sm-2 col-lg-7 col-sm-10" type="search" placeholder="Busca lo que necesites" aria-label="Search">
                <button class="btn btn-outline-light mr-3" type="submit">Buscar</button>
            </form>
            <ul class="navbar-nav mr-auto">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#modal_categorias"><p class="nav-icon"><i class="fas fa-bars"></i></p>Categorias</a>
            	<a href="./php/carrito.php" class="nav-link"><p class="nav-icon"><i class="fas fa-shopping-cart"></i></p><p>Mi carrito</p></a>
            	<?php
                if (isset($_SESSION['user'])) {
                    echo '<a href="./php/cerrar.php" class="nav-link"><p class="nav-icon"><i class="fas fa-user-slash"></i></p><p>Cerrar sesión</p></a>';

                    
                }else{
                    echo '<a href="#" class="nav-link" data-toggle="modal" data-target="#modal_user" ><p class="nav-icon"><i class="fas fa-user"></i></p><p>Inciar sesión</p></a>';
                }    
                ?>
            	
            </ul>
    		
    	</div>

    	<div class="modal fade" id="modal_categorias">
    		<div class="modal-dialog">
    			<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title"><b>Categorías</b></h2>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
    				<div class="modal_body">
                        <div class="list-group">
                            <a href="./php/camaras.php" class="list-group-item list-group-item-action"><p><i class="fas fa-camera"></i></p><p>Cámara y Fotografía</p></a>
                            <a href="./php/celulares.php" class="list-group-item list-group-item-action"><p><i class="fas fa-mobile-alt"></i></p><p>Teléfonos Celulares y Accesorios</p></a>
                            <a href="./php/audiovideo.php" class="list-group-item list-group-item-action"><p><i class="fas fa-headphones-alt"></i></p><p>Audio y Vídeo</p></a>
                            <a href="./php/computadores.php" class="list-group-item list-group-item-action"><p><i class="fas fa-laptop"></i></p><p>Computadores y Accesorios</p></a>
                            <a href="./php/televisores.php" class="list-group-item list-group-item-action"><p><i class="fas fa-tv"></i></p><p>Televisores</p></a>
                            <a href="./php/consolas.php" class="list-group-item list-group-item-action"><p><i class="fas fa-gamepad"></i></p><p>Consolas de Videojuegos y Accesorios</p></a>
                        </div>
    				</div>
    			</div>
    		</div>
    	</div>


    	<div class="modal fade" id="modal_user">
    		<div class="modal-dialog">
    			<div class="modal-content">
    				<div class="modal-header">
						<h2 class="modal-title"><b>Iniciar Sesión</b></h2>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
                        <form action="./php/login.php" method="POST" name="login_form">
                            <div class="form-group">
                                <label>Usuario</label><input class="form-control form-control-sm" type="text" name="user" required>
                            </div>                    		
                            <div class="form-group">
                                <label>Contraseña</label><input class="form-control form-control-sm" type="password" name="password" size="6" maxlength="10" required>
                            </div>

                            <button class="btn col-12" type="submit">Iniciar Sesión</button><br><br>
                            <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#modal_registro">Aún no estas registrado? Haz click aquí</a>
                        </form>
					</div>
    				
    			</div>
    		</div>
    	</div>


    	<div class="modal fade" id="modal_registro">
    		<div class="modal-dialog">
    			<div class="modal-content">
    				<div class="modal-header">
						<h2 class="modal-title"><b>Registrarse</b></h2>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body">
						<form action="./php/registro_new_user.php" method="POST" name="regist_form">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control form-control-sm" type="text" name="name" required>
                            </div>
                            <div class="form-group"> 
                                <label>Fecha de nacimiento</label><input class="form-control form-control-sm" type="date" name="birthday" required>
                            </div>
                            <div class="form-group">
                                <label>Teléfono</label><input class="form-control form-control-sm" type="number" name="phone" require>
                            </div>
                            <div class="form-group">
                                <label>Correo electrónico</label><input class="form-control form-control-sm" type="email" name="mail" required>
                            </div>                    		
                            <div class="form-group">
                                <label>Contraseña</label><input class="form-control form-control-sm" type="password" name="password" size="6" maxlength="10" required>
                            </div>
            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="radio1" name="condiciones" required>
                                <label class="form-check-label" for="defaultCheck1">Acepto los términos y condiciones</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="2" id="radio2" name="recibir" required>
                                <label class="form-check-label" for="defaultCheck1">Deseo recibir correos con novedades</label>
                            </div>
                            <br>

                            <button class="btn" type="submit">Registrarme</button>
                            <button class="btn" type="reset">Borrar información</button>
                        </form>
					</div>
    				
    			</div>
    		</div>
    	</div>
    	
    </div>

    <?php
    if (isset($_SESSION['user'])) {
        echo '<div class="container-fluid">
                <h5 class="mb-0 text-center">!Bienvenido! '.$_SESSION['user'].'</h5>
            </div>';
      
    }
    ?>


    <!-- Carousel pagina principal -->
    <section class="container-fluid">
        <div class="row">
            <div class="col">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        
                    </ol>
                    <div class="carousel-inner rounded">
                        <div class="carousel-item active">
                            <img  src="./img/slider1.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/slider2.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/slider3.png" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/slider4.png" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/slider5.png" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!--Métodos de pagos-->
    <section class="container pagos" style="background-color: white;">
        <div class="row">
            <div class="col">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a data-toggle="modal" data-target="#modalpagos" href="#credito"><p class="icono"><i class="far fa-credit-card"></i></p></a>
                        <p class="title-item">Paga con tarjeta de credito</p>
                        
                    </li>
                        
                    <li class="nav-item">
                        <a data-toggle="modal" data-target="#modalpagos" href="#banco"><p class="icono"><i class="fas fa-university"></i></p></a>
                        <p class="title-item">Transfiere desde tu banco</p>
                        
                    </li>
                    <li class="nav-item">
                        <a data-toggle="modal" data-target="#modalpagos" href="#efectivo"><p class="icono"><i class="far fa-money-bill-alt"></i></p></a>
                        <p class="title-item">Paga en efectivo</p>
                        
                    </li>
                    <li class="nav-item">
                        <a data-toggle="modal" data-target="#modalpagos" href=""><p class="icono"><i class="fas fa-plus-circle"></i></p></a>
                        <p class="title-item">Más medios de pago</p>

                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!--modal para ver los métodos de pagos-->

    <section class="modal" tabindex="-1" role="dialog" id="modalpagos" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Métodos de pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row pb-4" id="credito">
                        <div class="col-lg-3 col-icon">
                            <p class="monal-icono"><i class="far fa-credit-card ico"></i></p>
                        </div>
                        <div class="col-lg-9">
                            <h5>Tarjeta de crédito</h5>
                            <p class="title-item">En hasta 48 coutas en todo el sitio</p>
                            <img src="./icons/visa.png" width="30px">
                            <img src="./icons/master.png" width="30px">
                        </div>
                    </div>
                    <div class="row pb-4" id="banco">
                        <div class="col-lg-3 col-icon">
                            <p class="monal-icono"><i class="fas fa-university"></i></p>
                        </div>
                        <div class="col-lg-9">
                            <h5>Transferencia desde tu banco</h5>
                            <p class="title-item">Termina tu compra y haz un traspaso online sin moverte de tu casa</p>
                            <img src="./icons/pse.png" width="30px">
                        </div>
                    </div>

                    <div class="row pb-4" id="efectivo">
                        <div class="col-lg-3 col-icon">
                            <p class="monal-icono"><i class="far fa-money-bill-alt"></i></p>
                        </div>
                        <div class="col-lg-9">
                            <h5>Efectivo en puntos de pago</h5>
                            <p class="title-item">Es muy simple, puede pagar en los siguientes puntos</p>
                            <img src="./icons/Efecty.png" width="40px">
                            <img src="./icons/via.png" width="70px">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Sección de categorias destacadas-->

    <section class="container">
        <div class="row">
            <div class="col">
                <div class="card-deck pb-4">
                    <div class="card bg-dark text-white">
                        <img class="card-img" src="./img/camaras.jpg" height="260">
                        <div class="card-img-overlay">
                          <h3 class="card-title">Cámaras</h3>
                          <p class="card-text card-text-categorias">Toma tu mejores fotos</p>
                          <a class="btn btn-light btn-personalizado" href="./php/camara.php">Comprar ahora</a>
                        </div>
                    </div>

                    <div class="card bg-dark text-white">
                        <img class="card-img" src="./img/audifonos.jpg" height="260">
                        <div class="card-img-overlay">
                          <h3 class="card-title">Audifonos</h3>
                          <p class="card-text card-text-categorias">Escuchar buen sonido</p>
                          <a class="btn btn-light btn-personalizado" href="./php/audiovideo.php">Comprar ahora</a>
                        </div>
                    </div>

                    <div class="card bg-dark text-white">
                        <img class="card-img" src="./img/cel.jpg" height="260">
                        <div class="card-img-overlay">
                          <h3 class="card-title">Celulares</h3>
                          <p class="card-text card-text-categorias">Celulares de todas las marcas</p>
                          <a class="btn btn-light btn-personalizado" href="./php/celulares.php">Comprar ahora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="row">
            <div class="col">
                <div class="card-deck pb-4">
                    <div class="card bg-dark text-white">
                        <img class="card-img card-categoria-img" src="./img/videogames.jpg" height="600">
                        <div class="card-img-overlay">
                          <h3 class="card-title">Consola de videojuegos</h3>
                          <p class="card-text card-text-categorias">Consigue todo tipo de consola para jugra los mejores juegos</p>
                          <a class="btn btn-light btn-personalizado" href="./php/consolas.php">Comprar ahora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card-deck pb-4">
                    <div class="card bg-dark text-white">
                        <img class="card-img card-categoria-img" src="./img/tv.jpg" height="600">
                        <div class="card-img-overlay">
                          <h3 class="card-title">Televisores y muchos más</h3>
                          <p class="card-text card-text-categorias">Disfruta del mejor centro de entretenimiento para tú hogar</p>
                          <a class="btn btn-light btn-personalizado" href="./php/televisores.php">Comprar ahora</a>
                        </div>
                    </div>

                    <div class="card bg-dark text-white">
                        <img class="card-img card-categoria-img" src="./img/stereo.jpg" height="600">
                        <div class="card-img-overlay">
                          <h3 class="card-title">Stereo</h3>
                          <p class="card-text card-text-categorias">Escuchar musica de buena calidad con sonido de buena calidad</p>
                          <a class="btn btn-light btn-personalizado" href="./php/audiovideo.php">Comprar ahora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Sección de productos destacados-->

    <section class="container mt-5">
        <div class="row mb-2">
            <div class="col">
                <h1 class="text-center">Algunos de nuetros productos</h1>
            </div>
        </div>
        <div class="row mb-5">
            <div class="divider w-25 pb-1 bg-warning ml-auto mr-auto"></div>
        </div>
        <div class="row">
            <div class="col">
                <h2>Ten el mejor ciene en tu casa</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card-deck">
                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/led1.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$1.668.759</h5>
                            <p class="card-text">Tv led 147cms (58) uhd smart samsung 58 pulgadas smart tv</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/led2.jpg" width="20">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$1.399.900</h5>
                            <p class="card-text">Televisor LG 50 uhd 50un7300pdc smart tv led</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/qled1.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$3.699.900</h5>
                            <p class="card-text">Televisor premium QLed Samsung 55 pulgadas uhd 4k</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/qled2.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$6.999.900</h5>
                            <p class="card-text">Televisor 75 pulgadas Samsung QLed 75q7 uhd 4k</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col">
                <h2>Mejores modelos de Smartphones</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card-deck">
                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/celular1.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$1.049.000</h5>
                            <p class="card-text">Celular Xiaomi redmi note 9 pro gris 128gb 6ram</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/celular2.jpg" width="20">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$1.429.000</h5>
                            <p class="card-text">Celular Samsung galaxy A71 cámara cuadruple silver plata</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/celular3.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$4.249.990</h5>
                            <p class="card-text">Iphone 12 negro 128gb</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/celular4.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$1.149.900</h5>
                            <p class="card-text">Celular motorola one fusión plus 128g</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col">
                <h2>Computadoras, tablets y muchos más</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card-deck">
                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/computadora1.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$1.130.770</h5>
                            <p class="card-text">Computador portátil lenovo 14 pulgadas athlon silver 4gb 1tb</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/computadora2.jpg" width="20">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$1.695.470</h5>
                            <p class="card-text">Computador portátil HP 14 pulgadas ci5 4gb 256gb ssd</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/tablet1.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$719.280</h5>
                            <p class="card-text">Tablet lenovo yoga smart 10 pulgadas 4gb 64gb</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/tablet2.jpg">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$913.000</h5>
                            <p class="card-text">Tablet Samsung galaxy 32gb</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>

    <div class="image-box" style="background-image: url('./img/background1.jpg')">
        <h1 class="card-title">Compra nuestros productos</h1><br>
        <h5 class="card-text card-text-categorias">Recibe descuentos del 10%, 20% y hasta el 40% con precios de locos</h5>
        <a class="btn btn-light btn-personalizado" href="#">Comprar ahora</a>
    </div>


    <!--Servicios a ofrecer-->

    <section class="container-fluid" style="background-color: white;">
        <div class="row">
            <div class="col serv">
                <p class="serv-icon"><i class="fas fa-money-check-alt"></i></p>
                <h5 class="title-item text-center">Precios increíbles</h5>
                <p class="text-muted text-center">Ofrecemos precios competitivos en nuestra gama de productos de más de 100 millones.</p>
            </div>    
            <div class="col serv">
                <p class="serv-icon"><i class="fas fa-truck-moving"></i></p>
                <h5 class="title-item text-center">Envíos a todo el mundo</h5>
                <p class="text-muted text-center">Realizamos envíos a más de 200 países y regiones.</p>
            </div>
            <div class="col serv">
                <p class="serv-icon"><i class="far fa-credit-card"></i></p>
                <h5 class="title-item text-center">Pago seguro</h5>
                <p class="text-muted text-center">Pague con los métodos de pago más populares y seguros del mundo.</p>
            </div> 
            <div class="col serv">
                <p class="serv-icon"><i class="fas fa-shield-alt"></i></p>
                <h5 class="title-item text-center">Compra con confianza</h5>
                <p class="text-muted text-center">Nuestra Protección al Comprador cubre su compra desde el clic hasta la entrega.</p>
            </div>  
            <div class="col serv">
                <p class="serv-icon"><i class="fas fa-user-friends"></i></p>
                <h5 class="title-item text-center">Centro de ayuda 24/7</h5>
                <p class="text-muted text-center">Asistencia las 24 horas para una experiencia de compra fluida.</p>
            </div> 
        </div>
    </section>

    <footer class="container-fluid footer-style">
        <div class="row footer-row-style">
            <div class="col-3 col-info">
                <h6 class="footer-text footer-tilte">SUSCRÍBETE A NUESTRO NEWSLETTER</h6>
                <small class="footer-text">Infórmate de lo último. Nuestras ofertas y novedades directamente en tu e-mail.</small>

                <h6>Siguenos en</h6>
                <p class="redes facebook"><i class="fab fa-facebook-square"></i></p>
                <p class="redes twitter"><i class="fab fa-twitter-square"></i></p>
                <p class="redes instagram"><i class="fab fa-instagram"></i></p>
            </div>

            <div class="col-3 col-nav-pie">
                <h6 class="footer-text footer-tilte">Páginas</h6>
                <nav class="nav flex-column">
                    <a class="nav-link" href="#">Inicio</a>
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modal_tiendas">Tienda</a>
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modal_about">Sobre Nosotros</a>
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modal_contact">Contacto</a>
                </nav>          
            </div>

            <div class="col-6 col-map">
                <h6 class="footer-text footer-tilte">Puntos físicos</h6>
                <div id="mapa"></div>
            </div>
        </div>

        <div class="row row-nav-footer">
            <div class="col">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modal_tiendas">Tienda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modal_about">Sobre Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modal_contact">Contacto</a>
                </li>
            </ul>
            </div>
        </div>

    </footer>
    <div class="container-fluid" style="background-color: #222222;">
        <div class="row">
            <div class="col">
                <p class="pie">© 2020-2021, Tecnocompras, Inc. o sus filiales</p>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_tiendas">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title"><b>Puntos físicos</b></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal_body">
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action" onclick="seleccionado(0)"><p><i class="fas fa-map-marked-alt" data-dismiss="modal"></i></p><p>Tecnocompra Bello</p></a>
                        <a class="list-group-item list-group-item-action" onclick="seleccionado(1)"><p><i class="fas fa-map-marked-alt" data-dismiss="modal"></i></p><p>Tecnocompra Cl. 65c, Medellín</p></a>
                        <a class="list-group-item list-group-item-action" onclick="seleccionado(2)"><p><i class="fas fa-map-marked-alt" data-dismiss="modal"></i></p><p>Tecnocompra Cl. 50 # 81 a 47, Medellín</p></a>
                        <a class="list-group-item list-group-item-action" onclick="seleccionado(3)"><p><i class="fas fa-map-marked-alt" data-dismiss="modal"></i></p><p>Tecnocompra Via Medellín-Via Sta. Elena</p></a>
                        <a class="list-group-item list-group-item-action" onclick="seleccionado(4)"><p><i class="fas fa-map-marked-alt" data-dismiss="modal"></i></p><p>Tecnocompra Itagüí</p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_about">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title"><b>Sobre Nosotros</b></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <h4 class="modal-title"><b>Descubre quiénes somos y que le ofrecemos a nuestros usuarios</b></h4><br>
                    <div class="row">
                        <div class="w-25 px-2 pb-2">
                            <img src="https://cdn2.f-cdn.com/contestentries/1416356/2678895/5ba16b39313d0_thumb900.jpg" alt="" width=95%>
                            <!-- <img src="https://static.vecteezy.com/system/resources/previews/000/107/902/non_2x/electronic-tech-elements-illustration-vector.jpg" alt="" width=95%><br>
                            <img src="https://cdn0.iconfinder.com/data/icons/shopping-and-e-commerce-57/60/buying__bag__shopping__secure__protection-512.png" alt="" width="90%"> -->
                        </div>
                        <div class="w-75 pl-2">
                            <p><span><b>TecnoCompras</b></span> es una pagina web que le permite a sus usuarios, comprar de manera sencilla, rápida y segura, diferentes tipos de electrodomésticos, los cuales se encuentran incluidos en diferentes categorías tales como celulares, computadores, cámaras, etc.,
                            los productos que se ofrecen dentro de TecnoCompras son totalmente garantizados, puesto que son adquiridos por proveedores oficiales o directamente por medio de la empresa manufacturera del mismo, contando con las garantías que ofrece el fabricante del producto;
                            el envío de los productos se hace por medio de la empresa de paquetería mas importante a nivel mundial DHL, los cuales ofrecen una extensa garantía a cerca de la integridad de los productos.</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_contact">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title"><b>Contacto</b></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <h4 class="modal-title"><b>Contáctate con nosotros</b></h4><hr>
                    <div class="row">
                        <div class="w-25 pl-5 pt-3">
                            <p><i class="fas fa-user fa-7x"></i></p>
                        </div>
                        <div class="w-75 pl-2">
                            <p><span><b>Maycol Esteban Zuluaga Montoya</b></span></p>
                            <p>Cofundador <br> Correo: maycol.zuluaga@udea.edu.co <br>Telefono: +57 300 355 3476</p>
                            <p  style="float: left;padding-left: 5px;"><i class="fab fa-facebook-square fa-2x"></i></p>
                            <p  style="float: left;padding-left: 20px;"><i class="fab fa-twitter-square fa-2x"></i></p>
                            <p  style="float: left;padding-left: 20px;"><i class="fab fa-instagram fa-2x"></i></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="w-25 pl-5 pt-3">
                            <p><i class="fas fa-user fa-7x"></i></p>
                        </div>
                        <div class="w-75 pl-2">
                            <p><span><b>Mateo Jaramillo Obando</b></span></p>
                            <p>Cofundador <br> Correo: mateo.jaramilloo@udea.edu.co <br>Telefono: +57 319 270 0110</p>
                            <p  style="float: left;padding-left: 5px;"><i class="fab fa-facebook-square fa-2x"></i></p>
                            <p  style="float: left;padding-left: 20px;"><i class="fab fa-twitter-square fa-2x"></i></p>
                            <p  style="float: left;padding-left: 20px;"><i class="fab fa-instagram fa-2x"></i></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    

</body>
</html>