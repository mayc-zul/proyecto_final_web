<!DOCTYPE html>
<html lang="en">
<head>
    <title>Televisores</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
    <!--iconos-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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

    <div class="navbar navbar-expand-sm navbar-dark bg-dark fixed">
    	<div class="col-3">
	    	<a href="../index.php" class="navbar-brand"><h2>TecnoCompras</h2></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>

    	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<input class="form-control mr-sm-2 col-7" type="search" placeholder="Busca lo que necesites" aria-label="Search">
            <button class="btn btn-outline-light mr-3" type="submit">Buscar</button>
    		
            <ul class="navbar-nav mr-auto">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#modal_categorias"><p class="nav-icon"><i class="fas fa-bars"></i></p>Categorias</a>
            	<a href="#" class="nav-link" data-toggle="modal" data-target="#modal_car"><p class="nav-icon"><i class="fas fa-shopping-cart"></i></p><p>Mi carrito</p></a>
            	<a href="#" class="nav-link" data-toggle="modal" data-target="#modal_user" ><p class="nav-icon"><i class="fas fa-user"></i></p><p>Inciar sesion</p></a>
            	
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
                            <a href="./camara.php" class="list-group-item list-group-item-action"><p><i class="fas fa-camera"></i></p><p>Cámara y Fotografía</p></a>
                            <a href="./celulares.php" class="list-group-item list-group-item-action"><p><i class="fas fa-mobile-alt"></i></p><p>Teléfonos Celulares y Accesorios</p></a>
                            <a href="./audiovideo.php" class="list-group-item list-group-item-action"><p><i class="fas fa-headphones-alt"></i></p><p>Audio y Vídeo</p></a>
                            <a href="./computadores.php" class="list-group-item list-group-item-action"><p><i class="fas fa-laptop"></i></p><p>Computadores y Accesorios</p></a>
                            <a href="./televisores.php" class="list-group-item list-group-item-action"><p><i class="fas fa-tv"></i></p><p>Televisores</p></a>
                            <a href="./consolas.php" class="list-group-item list-group-item-action"><p><i class="fas fa-gamepad"></i></p><p>Consolas de Videojuegos y Accesorios</p></a>
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
						<form>
                            <div class="form-group">
                                <label>Correo</label><input class="form-control form-control-sm" type="email" name="mail" required>
                            </div>                    		
                            <div class="form-group">
                                <label>Contraseña</label><input class="form-control form-control-sm" type="password" name="password" size="6" maxlength="10" required>
                            </div>

                            <button class="btn col-12" type="submit" data-dismiss="modal">Iniciar Sesión</button><br><br>
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
						<form>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control form-control-sm" type="text" name="name" required>
                            </div>
                            <div class="form-group"> 
                                <label>Fecha de nacimiento</label><input class="form-control form-control-sm" type="date" name="birthday" required>
                            </div>
                            <div class="form-group">
                                <label>Teléfono</label><input class="form-control form-control-sm">
                            </div>
                            <div class="form-group">
                                <label>Correo electrónico</label><input class="form-control form-control-sm" type="email" name="mail" required>
                            </div>                    		
                            <div class="form-group">
                                <label>Contraseña</label><input class="form-control form-control-sm" type="password" name="password" size="6" maxlength="10" required>
                            </div>
            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="radio1" id="radio1">
                                <label class="form-check-label" for="defaultCheck1">Acepto los términos y condiciones</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="radio2" id="radio2">
                                <label class="form-check-label" for="defaultCheck1">Deseo recibir correos con novedades</label>
                            </div>
                            <br>

                            <button class="btn" type="submit" data-dismiss="modal">Registrarme</button>
                            <button class="btn" type="reset">Borrar información</button>
                        </form>
					</div>
    				
    			</div>
    		</div>
    	</div>
    </div>

    <div class="container-fluid">
        <div class="row py-3">
            <div class="col">
                <h2>Televisores</h2>
            </div>
        </div>
        <div class="row">
            <aside class="col-3 scrollspy" data-spy="scroll" data-offset="0">
                <h5 class="border-bottom pt-3">Filtros</h5>
                <form action="" class="border-bottom pt-3">
                    <h6>Tipo</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="canon" id="Mcheck1"><label class="form-check-label">Stereo</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fujifilm" id="Mcheck2"><label class="form-check-label">Audifonos</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="gopro" id="Mcheck3"><label class="form-check-label">Video</label>
                    </div>
                </form>
                <form action="" class="border-bottom pt-3">
                    <h6>Precios</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="canon" id="Mcheck1"><label class="form-check-label">Menos de $499.000</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fujifilm" id="Mcheck2"><label class="form-check-label">$500.000 - $999.999</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="gopro" id="Mcheck3"><label class="form-check-label">$1.000.000 - $2.999.999</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="instax" id="Mcheck4"><label class="form-check-label">$3.000.000 - $3.999.999</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="nikon" id="Mcheck5"><label class="form-check-label">$4.000.000 - 4.999.999</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sony" id="Mcheck6"><label class="form-check-label"> Más de $5.000.000</label>
                    </div>
                </form>

                <form action="" class="border-bottom pt-3">
                    <h6>Marcas</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="canon" id="Mcheck1"><label class="form-check-label">SONOS</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fujifilm" id="Mcheck2"><label class="form-check-label">BOSE</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="gopro" id="Mcheck3"><label class="form-check-label">JBL</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="instax" id="Mcheck4"><label class="form-check-label">AMAZON</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="nikon" id="Mcheck5"><label class="form-check-label">SOUNDCORE</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sony" id="Mcheck6"><label class="form-check-label">SAMSUNG</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="canon" id="Mcheck1"><label class="form-check-label">LG</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="fujifilm" id="Mcheck2"><label class="form-check-label">DDSING</label>
                    </div>
                </form>

                <form action="" class="border-bottom">
                    <h6>Conexión WIFI</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="acc_camara" id="Tcheck1"><label class="form-check-label">Si</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="deportivas" id="Tcheck2"><label class="form-check-label">No</label>
                    </div>
                </form>
            </aside>
            <section class="col-9">
                <!--Ruta-->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Televisores</li>
                    </ol>
                </nav>
                <div class="card-deck pb-4">
                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/tv1.webp">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$899.900</h5>
                            <p class="card-text">Televisor LED Caixun 43 Pulgadas 109 Cms UHD Smart CX43S1USM</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/tv2.webp">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$1.219.900</h5>
                            <p class="card-text">Televisor Samsung 43 Tu6900 Crystal Uhd 4K Smart Tv</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/tv3.webp">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$850.000</h5>
                            <p class="card-text">Televisor Led Samsung 32 Pulgadas Smart Tv Un32t4300</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/tv4.webp">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$102.800</h5>
                            <p class="card-text">Tv Box 4k Convierte En Smart Tv Android 7.1 Ram 1gb Rom 8gb</p>
                        </div>
                    </div>
                </div>

                <div class="card-deck pb-4">
                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/tv5.webp">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$89.800</h5>
                            <p class="card-text">Soporte Extensible Doble North Bayou P6 Nuevo Para Tv De 40 A 75</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/tv6.webp">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$1.990.000</h5>
                            <p class="card-text">Televisor Lg 60 Pulgadas Uhd 4K 60Un7310 Smart Tv</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/tv7.webp">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$1.259.900</h5>
                            <p class="card-text">Televisor 50 Pulgadas 4K UHD Smart TV-126cm Serie F</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/tv8.webp">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$3.699.900</h5>
                            <p class="card-text">Tv Led 189 Cms (75) UHD Smart SAMSUNG 75 Pulgadas Smart Tv UN75TU7000</p>
                        </div>
                    </div>
                </div>

                <div class="card-deck pb-4">
                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/tv9.webp">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$1.134.899</h5>
                            <p class="card-text">Televisor 43 Pulgadas Lg 43Lm6300 Fhd Smart Tv
                            </p>
                        </div>
                    </div>
                    
                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/tv10.webp">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$39.799</h5>
                            <p class="card-text">Soporte Para Tv De 14 Hasta 55 Pulgadas</p>
                        </div>
                    </div>
                    
                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/tv11.webp">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$479.900</h5>
                            <p class="card-text">Televisor Caixun Led 80 Cms 32 Pulgadas Hd Básico CX32F1</p>
                        </div>
                    </div>

                    <div class="card card-producto">
                        <img class="card-img-top border-bottom" src="./img/tv12.webp">
                        <div class="card-body">
                            <h5 class="card-title text-warning">$55.780</h5>
                            <p class="card-text">Decodificador Tdt Usb+Control+Hdmi+Rca Sintonizador Tv</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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

    <footer class="container-fluid" style="background-color: #222222;">
        <div class="row">
            <div class="col">
                <h6 class="footer-text footer-tilte">SUSCRÍBETE A NUESTRO NEWSLETTER</h6>
                <small class="footer-text">Infórmate de lo último. Nuestras ofertas y novedades directamente en tu e-mail.</small>

                <h6>Siguenos en</h6>
                <p class="redes facebook"><i class="fab fa-facebook-square"></i></p>
                <p class="redes twitter"><i class="fab fa-twitter-square"></i></p>
                <p class="redes instagram"><i class="fab fa-instagram"></i></p>
            </div>

            <div class="col">
                <h6 class="footer-text footer-tilte">Páginas</h6>
                <nav class="nav flex-column">
                    <a class="nav-link" href="#">Inicio</a>
                    <a class="nav-link" href="#">Tienda</a>
                    <a class="nav-link" href="#">Sobre Nosotros</a>
                    <a class="nav-link" href="#">Contacto</a>
                </nav>          
            </div>

            <div class="col">
                <h6 class="footer-text footer-tilte">Puntos físicos</h6>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p class="pie">© 2020-2021, "nombre de la tienda", Inc. o sus filiales</p>
            </div>
        </div>
    </footer>
</body>
</html>