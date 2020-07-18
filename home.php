<?php

session_start();
	if(!isset($_SESSION['auth']) || $_SESSION['auth']==false ){
		header("Location: index.php");
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BandStore</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="icon" href="img/logo.png">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=true" async defer></script>
    <script type="text/javascript" src="codigo.js"></script>
    <script type="text/javascript" src="carro.js"></script>

    <style type="text/css">
        #mapa {
            width: 100%;
            height: 180%;
        }
         footer{
            background-color: rgb(192, 189, 189);
            color: black;
         }
         .Bda {
             padding-top: 40px;
        }
         .bienvenida {
             padding: 120px;
            padding-bottom: 10px;
            text-align: center;
            padding-top: 15px;
            height: 70px;
             background-color: rgba(224, 129, 129, 0.993);
            color: black;
        }
        
    </style>
    <script>
        let carrito = [];
        let total = 0;
        localStorage.c;
        let cont_bt6 = 0;
        let cont_bt7 = 0;
        let cont_bt8 = 0;
        let cont_bt9 = 0;
        let cont_bt10 = 0;
        let cont_bt11 = 0;
        
    </script>
 
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
       
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="home.php"><img src="img/logo.PNG" alt="" width="113" height="64"></a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="categorias.php">Productos </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="categorias.php" data-toggle="dropdown">Categorias</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="tecnologia.php">Tecnología</a>
                        <a class="dropdown-item" href="gadgets.php">Gadgets</a>

                    </div>
                </li>

            </ul>

            
            <br><br>
            <button type="button"  class="btn btn-info btn-md" ><?php print($_SESSION['user']); ?></button>
            <a href="control_salir.php" class="btn btn-outline-primary">Salir</a>            
        </div>
    </nav>

    <div class="row">
        <div class="col-lg-12">
            <div id="carousel-main" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/contenedor_p.png">
                        <div class="carousel-caption">
                            <h3>BandStore</h3>

                        </div>
                    </div>
                    <div class="carousel-item"><img src="img/contenedor_s.png">
                        <div class="carousel-caption">
                            <h3>BandStore</h3>

                        </div>
                    </div>
                    <div class="carousel-item"><img src="img/contenedor_t.png">
                        <div class="carousel-caption">
                            <h3>BandStore</h3>

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

    <div class="container">
        <div class="Bda">
            <div class="bienvenida">
                <h4> <b> Bienvenido <?php print($_SESSION['names']); ?> a tu Tienda Virtual BANDSTORE</b></h4>
            </div>
        </div>    

        <br>
    <div class="container">
        <div class="row">
            <!-- Elementos generados a partir del JSON -->
            <main id="items" class="col-sm-12 row"></main>
            <!-- Carrito -->
            <aside class="col-md-6">
                <h2>Carrito</h2>
                <!-- Elementos del carrito -->
                <ul id="carrito" class="list-group"></ul>
                <hr>
                <!-- Precio total -->
                <p class="text-right">Total: <span id="total"></span></p>
              <a href="realizarcompra.php"><button  type="button" class="btn btn-info btn-md"  data-target="#term">comprar</button></a>
            </aside>
        </div>
    </div>
    <br>

        <div class="ofert">
            <h4> <b> PRODUCTOS EN OFERTAS</b></h4>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="card text-center" style="width: 18rem;">
                    <img class="card-img-top" src="img/termo.jpeg" alt=" Card image cap " width="200" height="300">
                    <div class="card-body ">
                        <h5 class="card-title ">Mug lente de camara.</h5>
                        <p class="card-text "> <del>$35.000</del> <span class="precio">$25.000</span> </p>

                        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#term">Ver mas</button>

                    </div>

                    <!-- Modal -->
                    <div id="term" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header clr">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-4 col-lg-6 ">
                                            <img class="img_tec" src="img/termo.jpeg" alt="" width="100%" height="100%">
                                        </div>
                                        <div class="col-8 col-lg-6 ">

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
                                            <button  class="btn btn-primary" onclick="carFunction(1,false)" >Añadir al carro</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="card text-center" style="width: 18rem;">
                    <img class="card-img-top" src="img/piña.jpg" alt=" Card image cap " width="200" height="300">
                    <div class="card-body ">
                        <h5 class="card-title ">Lampara Piña.</h5>
                        <p class="card-text "> <del>$17.000</del> <span class="precio">$13.000</span> </p>
                        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#pina">Ver mas</button>

                    </div>

                    <!-- Modal -->
                    <div id="pina" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header clr">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-4 col-lg-6">
                                            <img class="img_tec" src="img/piña.jpg" alt="" width="100%" height="100%">
                                        </div>
                                        <div class="col-8 col-lg-6">

                                            <h5>LAMPARA PIÑA</h5>
                                            <hr>
                                            <p class="precio_cat">$13.000</p>
                                            <h6>Descripción</h6>
                                            <hr>
                                            <ul>
                                                <li>Agrega un toque de frescura a la habitación de tu pequeño bebe o cualquier lugar se la casa con esta adorable luz LED nocturna. Además de decorar bellamente su habitación durante el día, la luz nocturna
                                                    crea un ambiente cálido y relajante.</li>
                                                <li>Material: Plástico</li>

                                            </ul>
                                            <button  class="btn btn-primary" onclick="carFunction(2,false)" >Añadir al carro</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="card text-center" style="width: 18rem;">
                    <img class="card-img-top" src="img/contenedor3.JPG" alt=" Card image cap " width="200" height="300">
                    <div class="card-body ">
                        <h5 class="card-title ">Llavero GOT.</h5>
                        <p class="card-text "> <del>$20.000</del> <span class="precio">$10.000</span> </p>
                        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#got">Ver mas</button>

                    </div>

                    <!-- Modal -->
                    <div id="got" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header clr">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-4 col-lg-6">
                                            <div id="carousel-main3" class="carousel slide" data-ride="carousel">

                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="img_tec" src="img/contenedor3.JPG" alt="" width="100%" height="100%">

                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="img_tec" src="img/got1.JPG" alt="" width="100%" height="100%">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="img_tec" src="img/got2.JPG" alt="" width="100%" height="100%">
                                                    </div>

                                                </div>

                                                <a href="#carousel-main3" class="carousel-control-prev" data-slide="prev">
                                                    <span class="carousel-control-prev-icon"></span>
                                                </a>
                                                <a href="#carousel-main3" class="carousel-control-next" data-slide="next">
                                                    <span class="carousel-control-next-icon"></span>
                                                </a>

                                                <ul class="carousel-indicators">
                                                    <li data-target="#carousel-main3" class="active" data-slide-to=0></li>
                                                    <li data-target="#carousel-main3" data-slide-to=1></li>
                                                    <li data-target="#carousel-main3" data-slide-to=2></li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="col-8 col-lg-6">

                                            <h5>LLAVERO GOT</h5>
                                            <hr>
                                            <p class="precio_cat">$20.000</p>
                                            <h6>Descripción</h6>
                                            <hr>
                                            <ul>
                                                <li>Llavero de juego de tronos con diseño de la casa STARK, TARGARYEN Y BARATHEON.</li>
                                                <li>Material de calidad.</li>
                                                <li>Llavero Practico.</li>
                                                <li>Diseño único.</li>

                                            </ul>
                                            <button  class="btn btn-primary" onclick="carFunction(3,false)" >Añadir al carro</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ofert">
            <h4> <b> PRODUCTOS MAS VENDIDOS</b></h4>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="card text-center" style="width: 18rem;">
                    <img class="card-img-top" src="img/luna.jpg" alt=" Card image cap " width="200" height="300">
                    <div class="card-body ">
                        <h5 class="card-title ">Lampara Luna.</h5>
                        <p class="card-text "> <del>$29.000</del> <span class="precio">$23.000</span> </p>
                        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#LUNA">Ver mas</button>

                    </div>

                    <!-- Modal -->
                    <div id="LUNA" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header clr">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-4 col-lg-6">
                                            <div id="carousel-main1" class="carousel slide" data-ride="carousel">

                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="img_tec" src="img/luna.jpg" alt="" width="100%" height="100%">

                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="img_tec" src="img/luna1.jpeg" alt="" width="100%" height="100%">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="img_tec" src="img/luna2.jpeg" alt="" width="100%" height="100%">
                                                    </div>

                                                </div>

                                                <a href="#carousel-main1" class="carousel-control-prev" data-slide="prev">
                                                    <span class="carousel-control-prev-icon"></span>
                                                </a>
                                                <a href="#carousel-main1" class="carousel-control-next" data-slide="next">
                                                    <span class="carousel-control-next-icon"></span>
                                                </a>

                                                <ul class="carousel-indicators">
                                                    <li data-target="#carousel-main1" class="active" data-slide-to=0></li>
                                                    <li data-target="#carousel-main1" data-slide-to=1></li>
                                                    <li data-target="#carousel-main1" data-slide-to=2></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-8 col-lg-6">

                                            <h5>LAMPARA LUNA</h5>
                                            <hr>
                                            <p class="precio_cat">$23.000</p>
                                            <h6>Descripción</h6>
                                            <hr>
                                            <ul class="card-text">
                                                <li>Diseño novedoso.</li>
                                                <li>Funciona con baterias.</li>
                                                <li>Buena calidad.</li>
                                                <li>No incluye base de madera ella se sostiene sola.</li>
                                            </ul>
                                            <button  class="btn btn-primary" onclick="carFunction(4,false)" >Añadir al carro</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="card text-center" style="width: 18rem;">
                    <img class="card-img-top" src="img/CALAVERA.jpg" alt=" Card image cap " width="200" height="300">
                    <div class="card-body ">
                        <h5 class="card-title ">MUG Calavera.</h5>
                        <p class="card-text "><span class="precio">$32.000</span> </p>
                        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#cala">Ver mas</button>

                    </div>

                    <!-- Modal -->
                    <div id="cala" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header clr">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-4 col-lg-6">
                                            <img class="img_tec" src="img/CALAVERA.jpg" alt="" width="100%">
                                        </div>
                                        <div class="col-8 col-lg-6">

                                            <h5>MUG CALAVERA</h5>
                                            <hr>
                                            <p class="precio_cat">$32.000</p>
                                            <h6>Descripción</h6>
                                            <hr>
                                            <ul>
                                                <li>Este steampunk calavera taza de café está hecho de resina de alta calidad con acero inoxidable pintado a mano individualmente.</li>
                                                <li>Muy buenos acabados, que le dan realismo a la imagen.</li>
                                                <li>Alta calidad.</li>
                                            </ul>
                                            <button  class="btn btn-primary" onclick="carFunction(5,false)" >Añadir al carro</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="card text-center" style="width: 18rem;">
                    <img class="card-img-top" src="img/granada.jpg" alt=" Card image cap " width="200" height="300">
                    <div class="card-body ">
                        <h5 class="card-title ">Encendedor Granada.</h5>
                        <p class="card-text "><span class="precio">$15.000</span> </p>
                        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#enc_granada">Ver mas</button>

                    </div>

                    <!-- Modal -->
                    <div id="enc_granada" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header clr">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-4 col-lg-6">
                                            <div id="carousel-main2" class="carousel slide" data-ride="carousel">

                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="img_tec" src="img/granada.jpg" alt="" width="100%" height="100%">

                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="img_tec" src="img/granada1.jpg" alt="" width="100%" height="100%">
                                                    </div>

                                                </div>

                                                <a href="#carousel-main2" class="carousel-control-prev" data-slide="prev">
                                                    <span class="carousel-control-prev-icon"></span>
                                                </a>
                                                <a href="#carousel-main2" class="carousel-control-next" data-slide="next">
                                                    <span class="carousel-control-next-icon"></span>
                                                </a>

                                                <ul class="carousel-indicators">
                                                    <li data-target="#carousel-main2" class="active" data-slide-to=0></li>
                                                    <li data-target="#carousel-main2" data-slide-to=1></li>

                                                </ul>
                                            </div>

                                        </div>
                                        <div class="col-8 col-lg-6">

                                            <h5>ENCENDEDOR GRANADA</h5>
                                            <hr>
                                            <p class="precio_cat">$15.000</p>
                                            <h6>Descripción</h6>
                                            <hr>
                                            <ul>
                                                <li>Espectacular encendedor de pedernal en forma de granada.</li>
                                                <li>Recargable con gas butano.</li>
                                                <li>Diseño en acero inoxidable.</li>
                                                <li>Excelente calidad.</li>
                                            </ul>
                                            <button  class="btn btn-primary" onclick="carFunction(6,false)" >Añadir al carro</button>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
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
               
                    <div id="mapa"></div>
                    <div id="ubicacion"></div>
                
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