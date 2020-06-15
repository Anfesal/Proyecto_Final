<?php
    session_start();
    if(!isset($_SESSION['auth']) || $_SESSION['auth']==false ){
		$_SESSION['auth']= false;
    } 
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gadgets</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="icon" href="img/logo.png">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="index.php"><img src="img/logo.PNG" alt="" width="113" height="64"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                <?php 
                    if (!isset($_SESSION['auth']) || $_SESSION['auth']==true) { ?>
                            <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                    <?php }
                    
                ?>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="categorias.php">Productos <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="categorias.php" data-toggle="dropdown">Categorias</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="tecnologia.php">Tecnología</a>
                        <a class="dropdown-item active" href="gadgets.php">Gadgets</a>

                    </div>
                </li>

            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
            <br><br>
            <?php 
               
                if (!isset($_SESSION['auth']) || $_SESSION['auth']==true) { ?>
                     <button type="button"  class="btn btn-info btn-md" ><?php print($_SESSION['user']); ?></button>
                     <a href="control_salir.php" class="btn btn-outline-primary">Salir</a>              
                <?php } 

                else { ?>
                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Ingresa</button>
                    
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Iniciar Sesión</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <form id="login-form" method="POST" role="form" style="display: block;" action="control_sesion.php">
                                    <?php
                                        if(isset($_GET['error']) && $_GET['error']==true ){
                                        print("<h4>Error:Nombre de usuario o contraseña invalido</h4><br>");
                                            }
                                    ?>
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Usuario" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="contrasena" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                            <label for="remember"> Recordarme</label>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <button type="submit" name="enviar_i" class="btn btn-primary">Iniciar Sesión</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="#" tabindex="5" class="forgot-password">¿Has olvidado tu contraseña?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal1">Registrarse ahora</button>
                    <!-- Modal -->
                    <div id="myModal1" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Registro</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <form id="login-form" method="POST" role="form" style="display: block;" action="registro.php">
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Usuario" value="">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="correo" id="email" tabindex="2" class="form-control" placeholder="Correo">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="contrasena" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                            <label for="remember"> Recordarme</label>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">Registrarme</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php } 
            ?>
        </div>
    </nav>

    <div class="row">
        <div class="col-lg-12">
            <div id="carousel-main" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/contenedor_p.png">
                        <div class="carousel-caption">
                            <h3>Gadgets</h3>

                        </div>
                    </div>
                    <div class="carousel-item"><img src="img/contenedor_s.png">
                        <div class="carousel-caption">
                            <h3>Gadgets</h3>

                        </div>
                    </div>
                    <div class="carousel-item"><img src="img/contenedor_t.png">
                        <div class="carousel-caption">
                            <h3>Gadgets</h3>

                        </div>
                    </div>

                </div>

                <a href="#carousel-main" class="carousel-control-prev" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a href="#carousel-main" class="carousel-control-next" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

                <ul class="carousel-indicators">
                    <li data-target="#carousel-main" class="active" data-slide-to=0></li>
                    <li data-target="#carousel-main" data-slide-to=1></li>
                    <li data-target="#carousel-main" data-slide-to=2></li>

                </ul>
            </div>
        </div>



    </div>
    <br>
    <div class="container">

        <div class="ofert title">
            <h4> <b> GADGETS CURIOSIDADES</b></h4>
            <hr>
        </div>
        <br>
        <div class="card w-100 crd">
            <div class="row">
                <div class="col-md-4">
                    <img class="img_tec" src="img/CALAVERA.jpg" alt="" width="370" height="335">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mn">MUG CALAVERA</h5>
                        <hr>
                        <p class="precio_cat">$32.000</p>
                        <h6>Descripción</h6>
                        <hr>
                        <ul class="card-text">
                            <li>Este steampunk calavera taza de café está hecho de resina de alta calidad con acero inoxidable pintado a mano individualmente.</li>
                            <li>Muy buenos acabados, que le dan realismo a la imagen.</li>
                            <li>Alta calidad.</li>
                        </ul>
                        <label>Cantidad</label>
                        <input type="text" name="CANTIDAD" size="3" required>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card w-100 crd">
            <div class="row">
                <div class="col-md-4">
                    <img class="img_tec" src="img/termo.jpeg" alt="" width="370" height="335">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mn">MUG LENTE CAMARA</h5>
                        <hr>
                        <p class="precio_cat">$25.000</p>
                        <h6>Descripción</h6>
                        <hr>
                        <ul class="card-text">
                            <li>Material ABS y acero inoxidable.</li>
                            <li>Medidas 7. 5cm x 13. 5cm.</li>
                            <li>Ideal para llevar tus bebidas.</li>
                            <li>Diseño lente de cámara.</li>
                        </ul>
                        <label>Cantidad</label>
                        <input type="text" name="CANTIDAD" size="3" required>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card w-100 crd">
            <div class="row">
                <div class="col-md-4">
                    <img class="img_tec" src="img/luna.jpg" alt="" width="370" height="335">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mn">LAMPARA LUNA</h5>
                        <hr>
                        <p class="precio_cat">$25.000</p>
                        <h6>Descripción</h6>
                        <hr>
                        <ul class="card-text">
                            <li>Diseño novedoso.</li>
                            <li>Funciona con baterias.</li>
                            <li>Buena calidad.</li>
                            <li>No incluye base de madera ella se sostiene sola.</li>
                        </ul>
                        <label>Cantidad</label>
                        <input type="text" name="CANTIDAD" size="3" required>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card w-100 crd">
            <div class="row">
                <div class="col-md-4">
                    <img class="img_tec" src="img/esfera.jpg" alt="" width="330" height="235">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mn">ESFERA LABERINTO</h5>
                        <hr>
                        <p class="precio_cat">$18.000</p>
                        <h6>Descripción</h6>
                        <hr>
                        <ul class="card-text">
                            <li>Hay 100 barreras para conquistar con este juego que es fácil de jugar pero dificil de dominar.</li>
                            <li>Capacidad combinada de contrapeso, habilidad mental, lógica, juego de destreza.</li>
                            <li>Ejercer la capacidad práctica, mejorar el equilibrio, mejorar la comprensión del espacio</li>

                        </ul>
                        <label>Cantidad</label>
                        <input type="text" name="CANTIDAD" size="3" required>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card w-100 crd">
            <div class="row">
                <div class="col-md-4">
                    <img class="img_tec" src="img/llavero.JPG" alt="" width="370" height="335">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title mn">LLAVERO GUANTE THANOS</h5>
                        <hr>
                        <p class="precio_cat">$16.000</p>
                        <h6>Descripción</h6>
                        <hr>
                        <ul class="card-text">
                            <li>Metalico.</li>
                            <li>Buena calidad.</li>
                            <li>Contramarcado.</li>
                            <li>Contiene las 6 gemas.</li>

                        </ul>
                        <label>Cantidad</label>
                        <input type="text" name="CANTIDAD" size="3" required>
                        <a href="#" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 text-left">
                    <h6 class="text-muted lead">CONTACTO:</h6>
                    <h6 class="text-muted">
                        Calle 65 #55-30<br> Barrio Chagualo.<br> Medellín, Antioquia. <br> Teléfono: 3182044125.<br>
                    </h6>
                </div>

                <div class="col-xs-12 col-md-6 text-right">
                    <h6 class="text-muted lead">ENCUENTRANOS EN LAS REDES</h6>
                    <div class="redes-footer">
                        <a href="https://www.facebook.com/"><img src="img/facebook.png" width="10%"></a>
                        <a href="https://twitter.com/"><img src="img/twitter.png" width="10%"></a>
                        <a href="https://www.instagram.com/"><img src="img/instagram.png" width="10%"></a>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12 text-right">
                    <p class="text-muted small">BandStore, Tu tienda virtual.<br> Todos los derechos reservados.</p>
                </div>

            </div>

        </div>
        </div>
        </div>
    </footer>
</body>

</html>