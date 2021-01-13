<?php
session_start();
include_once './conexionDB.php';

//Variables para la base de dato del carrito
if (!isset($_SESSION)) {
    $categoria = $_SESSION['categoria'];
    $id_producto = $_SESSION['id_producto'];
}


//carcar base de datos del carrito

$sql_productos_add = "SELECT * FROM carrito WHERE id_usuario=?"; //Nombre de la tabla
$gsent_producto_add = $pdo->prepare($sql_productos_add); //pdo es la conexion traida desde connect
if (isset($_SESSION['id'])){
    $gsent_producto_add->execute(array($_SESSION['id']));
}else{
    $gsent_producto_add->execute(array(0));
}

$resultado_producto_add = $gsent_producto_add->fetchAll();
$row_producto = $gsent_producto_add->rowCount();
$count_total = 0;
for ($i=0; $i <$row_producto ; $i++) { 
    $count_total += $resultado_producto_add[$i]['cantidad'];
}
?>

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

    <div class="navbar navbar-expand-lg navbar-dark bg-dark fixed">
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



    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="float-left">Carrito </h2><?php echo '<h4 class="text-muted">('.$count_total.' producto)</h4>';?>
            </div>
        </div>
    </div>

    <?php 
    $total_compra = 0;
    for ($i=0; $i <$row_producto ; $i++){
  
        $sql_unico = "SELECT * FROM ".$resultado_producto_add[$i]['categoria']." WHERE id=?"; //Nombre de la tabla
        $gsent_unico = $pdo->prepare($sql_unico); //pdo es la conexion traida desde connect
        $gsent_unico->execute(array($resultado_producto_add[$i]['id_producto']));
        $resultado_unico = $gsent_unico->fetch();
        $total = intval(preg_replace('/[.$]/','',$resultado_unico["precio"])) * $resultado_producto_add[$i]['cantidad'];
        $total_compra += $total;
    }
    ?>

    
    <div class="container">
        <?php for ($i=0; $i <$row_producto ; $i++):?>
        <?php 
        $sql_unico = "SELECT * FROM ".$resultado_producto_add[$i]['categoria']." WHERE id=?"; //Nombre de la tabla
        $gsent_unico = $pdo->prepare($sql_unico); //pdo es la conexion traida desde connect
        $gsent_unico->execute(array($resultado_producto_add[$i]['id_producto']));
        $resultado_unico = $gsent_unico->fetch();?>
        
        <div class="row mb-2">
            <div class="col-8">
                <div class="card flex-row flex-wrap mb-3">
                    <div class="card-header border-0">
                        <img src="data:image/jpg;base64,<?php echo base64_encode(($resultado_unico['imagen'])); ?>" width="200">
                    </div>
                    <div class="card-block px-3">
                        <h3 class="card-title"><?php echo $resultado_unico["nombre"]?></h3>
                        <h5 class=""> Precio unitario: <?php echo $resultado_unico["precio"]?></h5>
                        <?php $total = intval(preg_replace('/[.$]/','',$resultado_unico["precio"])) * $resultado_producto_add[$i]['cantidad'];?>
                        <h5 class=""> Total: $<?php echo number_format($total)?></h5> 
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <a href="remove.php?id=<?php echo $resultado_producto_add[$i]['id']?>" class="btn btn-outline-dark <?php echo $resultado_producto_add[$i]['cantidad'] == 1 ? 'disabled': '' ?>"><i class="fas fa-minus"></i></a>
                            </div>
                            <!--<button href="" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="btn btn-dark"><i class="fas fa-minus"></i></button>-->
                            <input class="quantity" min="0" name="quantity" value="<?php echo $resultado_producto_add[$i]['cantidad'] ?>" type="number">
                            <div class="input-group-append">
                                <a href="agregar.php?id=<?php echo $resultado_producto_add[$i]['id']?>&categoria=<?php echo $resultado_producto_add[$i]['categoria']?>" class="btn btn-outline-dark "><i class="fas fa-plus"></i></a>
                            </div>
                            <!--<button href="./mas.php" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="btn btn-dark"><i class="fas fa-plus"></i></button>-->
                        </div>
                        <a class="btn btn-dark mt-3" href="eliminar_carrito.php?id=<?php echo $resultado_producto_add[$i]['id']?>">Eliminar del carrito</a>
                    </div>
                </div>
            </div>
            <?php if($i == 0):?>
            <div class="col-4 bg-white rounded">
                <h5 class="mt-3"> Total de compra: $<?php echo number_format($total_compra)?></h5>
                <br>
                <div id="paypal-button-container"></div>

                    <!-- Include the PayPal JavaScript SDK -->
                    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

                    <script>
                        // Render the PayPal button into #paypal-button-container
                        paypal.Buttons({

                            // Set up the transaction
                            createOrder: function(data, actions) {
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: '88.44'
                                        }
                                    }]
                                });
                            },

                            // Finalize the transaction
                            onApprove: function(data, actions) {
                                return actions.order.capture().then(function(details) {
                                    // Show a success message to the buyer
                                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                                });
                            }


                        }).render('#paypal-button-container');
                    </script>
                </div>
            <?php endif?>
        </div>
        <?php endfor?>
    </div>
    
    
</body>
</html>