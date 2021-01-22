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
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/verificacion.js"></script>
    
    <!--iconos-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!--Programa para el mapa-->
    <script text="text/javascript" src="../js/mapa.js"></script> 

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

    <?php 
        include_once './conexionDB.php';

        $sql_leer = "SELECT * FROM audiovideo"; //Nombre de la tabla
        $gsent = $pdo->prepare($sql_leer); //pdo es la conexion traida desde connect
        $gsent->execute();
        $resultado = $gsent->fetchAll();
        
        if ($_POST) {
            $nombre = $_POST["nombre"];
            $precio = $_POST["precio"];
            $descripcion = $_POST["descripcion"];
            $imagen = file_get_contents($_FILES["imagen"]["tmp_name"]);

            $sql_agregar = "INSERT INTO audiovideo (nombre,precio,descripcion,imagen) VALUES (?,?,?,?)";
            $sentencia_agregar = $pdo->prepare($sql_agregar);
            $sentencia_agregar->execute(array($nombre,$precio,$descripcion,$imagen));

            header("location:./audiovideo.php");
        }

    ?>
    <?php if ($_GET): ?>

        <?php 
            $id = $_GET['id'];
            $sql_unico = "SELECT * FROM audiovideo WHERE id=?"; //Nombre de la tabla
            $gsent_unico = $pdo->prepare($sql_unico); //pdo es la conexion traida desde connect
            $gsent_unico->execute(array($id));
            $resultado_unico = $gsent_unico->fetch();
        ?>

        <script type="text/javascript">
            $(window).on('load', function() {
                $('#modal_editar').modal('show');
            });
        </script>
        <div class="modal fade" id="modal_editar">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title"><b>Editar Producto</b></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" action="editarA.php" name="edit_product">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $resultado_unico['id'] ?>">
                                <label>Nombre del producto</label><input class="form-control form-control-sm" type="text" name="nombre" value="<?php echo $resultado_unico['nombre'] ?>" required>
                            </div>
                            <img style="margin: auto; display: block;" width="250px" src="data:image/jpg;base64,<?php echo base64_encode(($resultado_unico['imagen'])); ?>">                    		
                            <div class="form-group">
                                <label>Precio del producto</label><input class="form-control form-control-sm" type="text" name="precio" value="<?php echo $resultado_unico['precio'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Descripcion del producto</label><input class="form-control form-control-sm" type="text" name="descripcion" value="<?php echo $resultado_unico['descripcion'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Imagen del producto</label><input class="form-control form-control-sm" type="file" name="imagen" required>
                            </div>
                            

                            <input class="btn col-12" type="submit" value="Guardar Cambios"><br>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    <?php endif ?>

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
            <a href="../index.php" class="navbar-brand"><h1><b>TecnoCompras</b></h1></a>
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
            	<a href="./carrito.php" class="nav-link"><p class="nav-icon"><i class="fas fa-shopping-cart"></i></p><p>Mi carrito</p></a>
            	<?php
                if (isset($_SESSION['user'])) {
                    echo '<a href="./cerrar.php" class="nav-link"><p class="nav-icon"><i class="fas fa-user-slash"></i></p><p>Cerrar sesión</p></a>';

                    
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
                            <a href="./camaras.php" class="list-group-item list-group-item-action"><p><i class="fas fa-camera"></i></p><p>Cámara y Fotografía</p></a>
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
                        <form action="./login.php" method="POST" name="login_form">
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
                        <form action="./registro_new_user.php" method="POST" name="regist_form">
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
                <h4 class="text-center">Audio y vídeo</h4>
                <p>Encuentra equipos de sonido, audífonos, parlantes, cámaras de vídeo, barras de sonido, teatros en casa y mucho más. Grandes marcas como Xiaomi, Samsung, Sony, JBL, LG, Nikon, descubre las mejores opciones para elegir de excelente calidad.</p>
            </div>
        </div>


        <div class="row">
        <a class="btn btn-dark btn-collapse" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><p class="icon-filter"><i class="fas fa-filter"></p></i>Filtros</a>
            <aside class="col-lg-3 col-md-3 col-filtro collapse show scrollspy" data-spy="scroll" data-offset="0" id="collapseExample">
                <h5 class="border-bottom pt-3 title-fil">Filtros</h5>
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
            <section class="col-lg-9 col-md-9 col-sm-12 col-xs-12"> 
                <!--Ruta-->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Audio y video</li>
                    </ol>
                </nav>

                <?php if (isset($_SESSION['user'])): ?>
                    <?php if($_SESSION['tipo_usuario'] == 'administrador') : ?>
                        <script type="text/javascript" src="../js/verificacion2.js"></script>
                        
                        <div class="card-deck pb-4">
                            <div class="card card-producto" data-toggle="modal" data-target="#modal_agregar">
                                <div class="card-body bg-light">
                                    <a href="#" class="nav-link"><i class="fas fa-plus text-dark" style="font-size: 120px; text-align: center; display: block;"></i></a>
                                </div>
                            </div>
                        

                            <div class="modal fade show" id="modal_agregar">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title"><b>Agregar Productos</b></h2>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form method="POST" enctype="multipart/form-data" name="add_product">
                                                <div class="form-group">
                                                    <label>Nombre del producto</label><input class="form-control form-control-sm" type="text" name="nombre" required>
                                                </div>                    		
                                                <div class="form-group">
                                                    <label>Precio del producto</label><input class="form-control form-control-sm" type="text" name="precio" value="$"required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Descripcion del producto</label><input class="form-control form-control-sm" type="text" name="descripcion"required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Imagen del producto</label><input class="form-control form-control-sm" type="file" name="imagen"required>
                                                </div>
                                                

                                                <input class="btn col-12" type="submit" value="Agregar"><br>
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <?php for($i=0; $i < count($resultado); $i++): ?>
                                
                                
                                <div class="card card-producto">
                                    <a href="vistaproducto.php?categoria=<?php echo 'audiovideo'?>&id=<?php echo $resultado[$i]['id']?>"><img  class="card-img-top border-bottom" src="data:image/jpg;base64,<?php echo base64_encode(($resultado[$i]['imagen'])); ?>"></a>
                                    <div class="card-body">
                                        <h5 class="card-title text-warning"><?php echo $resultado[$i]['precio'] ?></h5>
                                        <p class="card-text"><?php echo $resultado[$i]['nombre'] ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="audiovideo.php?id=<?php echo $resultado[$i]['id']?>"><i class="fas fa-pencil-alt" style="float: left;"></i></a><a href="eliminarC.php?id=<?php echo $resultado[$i]['id']?>"><i class="far fa-trash-alt" style="float: right;"></i></a>
                                    </div>
                                </div>
                                <?php
                                    if (($i+1) == count($resultado)) {
                                        echo "</div>";
                                    }
                                    elseif (($i+2)%4 == 0) {
                                        echo "</div>";
                                        echo '<div class="card-deck pb-4">';
                                    }                	
                                ?>
                            <?php endfor ?>	
                    
                    <?php else: ?>
                        <div class="card-deck pb-4">
                                
                                <?php for($i=0; $i < count($resultado); $i++): ?>
                                    
                                    
                                    <div class="card card-producto">
                                        <a href="vistaproducto.php?categoria=<?php echo 'audiovideo'?>&id=<?php echo $resultado[$i]['id']?>"><img  class="card-img-top border-bottom" src="data:image/jpg;base64,<?php echo base64_encode(($resultado[$i]['imagen'])); ?>"></a>
                                        <div class="card-body">
                                            <h5 class="card-title text-warning"><?php echo $resultado[$i]['precio'] ?></h5>
                                            <p class="card-text"><?php echo $resultado[$i]['nombre'] ?></p>
                                        </div>
                                    </div>
                                    <?php
                                        if (($i+1) == count($resultado)) {
                                            echo "</div>";
                                        }
                                        elseif (($i+1)%4 == 0) {
                                            echo "</div>";
                                            echo '<div class="card-deck pb-4">';
                                        }                	
                                    ?>
                                <?php endfor ?>
                    
                    
                    <?php endif ?>

                <?php else: ?>
                    <div class="card-deck pb-4">
                            
                            <?php for($i=0; $i < count($resultado); $i++): ?>
                                
                                
                                <div class="card card-producto">
                                <a href="vistaproducto.php?categoria=<?php echo 'audiovideo'?>&id=<?php echo $resultado[$i]['id']?>"><img  class="card-img-top border-bottom" src="data:image/jpg;base64,<?php echo base64_encode(($resultado[$i]['imagen'])); ?>"></a>
                                    <div class="card-body">
                                        <h5 class="card-title text-warning"><?php echo $resultado[$i]['precio'] ?></h5>
                                        <p class="card-text"><?php echo $resultado[$i]['nombre'] ?></p>
                                    </div>
                                </div>
                                <?php
                                    if (($i+1) == count($resultado)) {
                                        echo "</div>";
                                    }
                                    elseif (($i+1)%4 == 0) {
                                        echo "</div>";
                                        echo '<div class="card-deck pb-4">';
                                    }                	
                                ?>
                            <?php endfor ?>

                <?php endif ?>

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
                    <a class="nav-link" href="../index.php">Inicio</a>
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modal_tiendas">Tienda</a>
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modal_about">Sobre Nosotros</a>

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
                    
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#modal_contact">Contacto</a>

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
                    <a class="nav-link active" href="../index.php">Inicio</a>
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

</body>
</html>