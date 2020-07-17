
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
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <style type="text/css">
        #mapa {
            width: 100%;
            height: 180%;
        }
         footer{
            background-color: rgb(192, 189, 189);
            color: black;
         }
         .log_in {
            padding: 10px;
            margin: 10px;
            margin-left: 400px;
            align-items: center;
            text-align: center;
            border: 2px solid #ccc;
            width: 40%;
            justify-content: center;
            background-color: rgb(224, 146, 146);
            border-color: crimson;
        }
        .dato_s{
            background-color: black;
        }
        .btn_idx{
            border-radius: 5px;
            padding: 10px 7px;
            text-decoration: none;
            color: #fff;
            background-color: #333;
            margin: 5px;
        }
        
    </style>
   <script>
        let carrito = [];
        let total = 0;
        localStorage.c;
        
    </script>

<script type="text/javascript">
let desplazamiento_Actual=900;
let ubicacionPrincipal = window.pageYOffset;
window.onscroll = function(){
   desplazamiento_Actual=window.pageYOffset;
   if(ubicacionPrincipal>=desplazamiento_Actual){
       document.getElementById("nav-a").style.top="0";
    }
    else{
         document.getElementById("nav-a").style.top="-100px";

    }
    ubicacionPrincipal=desplazamiento_Actual;
}
</script>

</head>

<body>
    <nav id="nav-a" class="navbar fixed-top navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php"></a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
               
                <li class="nav-item ">
                    <a class="nav-link" href="categorias.php">Productos <span class="sr-only">(current)</span></a>
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
       

            <button  class="btn_idx" onclick="location.href='registrar.php'">Registrarse ahora</button>
            
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

                    <div class="log_in">
                        <div >
                        <div >
                        
                            <h4 >Iniciar Sesión</h4>
                               
                        </div>
                        <div >
                            <form id="login-form" method="POST" role="form" style="display: block;" action="control_sesion.php">
                            <?php
                                if(isset($_GET['error']) && $_GET['error']==true ){
                                print("<h4>Error:Nombre de usuario o contraseña invalido</h4><br>");
                                    }
                            ?>
                                <div class="form-group dato_s" >
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Usuario" value="" required>
                                </div>
                                <div class="form-group dato_s" >
                                    <input type="password" name="contrasena" id="password" tabindex="2" class="form-control" placeholder="Contraseña" required>
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
                                
                            </form>
                        </div>
                       </div>
                    </div>                               


    <br>
                      
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