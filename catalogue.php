<?php
  session_start();

  require 'database.php';
  $user = null;

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT idcliente, correo, password, user FROM cliente WHERE idcliente = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);


    if (count($results) > 0) {
      $user = $results;
    }
  }
  if($user==null){
      header("Location: indice.php");
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tu eCommerce</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">Tu eCommerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Men&uacute; desplegable</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Elemento 1</a>
                <a class="dropdown-item" href="#">Elemento 2</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Otro Elemento</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <li class="nav-item">
              <a class= "nav-link" href="logout.php">Cerrar sesion</a>
            </li>
            <li class="nav-item">
              <a href="verusuario.php">
                <img style="width: 35px; height: 35px;" src="images/perfil2.png">
              </a>
            </li>

            
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscaar">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
          </form>
        </div>
      </div>
    </nav>
    <div class="container mt-3">
      <div class="row">
        <div class="col-12">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleControls" data-slide-to="1"></li>
              <li data-target="#carouselExampleControls" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="images/1920x500.gif" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Banner 1 Heading</h5>
                  <p>Banner 1 Descripci&oacute;n</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/1920x500.gif" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Banner 2 Heading</h5>
                  <p>Banner 2 Descripci&oacute;n</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/1920x500.gif" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Banner 3 Heading</h5>
                  <p>Banner 3 Descripci&oacute;n</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
            </a>
          </div>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-4">
          <div class="row">
            <div class="col-2"><img class="rounded-circle" alt="Free Shipping" src="images/40X40.gif"></div>
            <div class="col-lg-6 col-10 ml-1">
              <h4>Envíos a toda la república</h4>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="row">
            <div class="col-2"><img class="rounded-circle" alt="Free Shipping" src="images/40X40.gif"></div>
            <div class="col-lg-6 col-10 ml-1">
              <h4>Garantía de Devolución</h4>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="row">
            <div class="col-2"><img class="rounded-circle" alt="Free Shipping" src="images/40X40.gif"></div>
            <div class="col-lg-6 col-10 ml-1">
              <h4>Precios Bajos&nbsp;</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <h2 class="text-center">PRODUCTOS RECOMENDADOS</h2>
    <hr>
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">T&iacute;tulo</h5>
              <p class="card-text">Descripci&oacute;n.</p>
              <a href="#" class="btn btn-primary">Agregar al carrito</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">T&iacute;tulo</h5>
              <p class="card-text">Descripci&oacute;n.</p>
              <a href="#" class="btn btn-primary">Agregar al carrito</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">T&iacute;tulo</h5>
              <p class="card-text">Descripci&oacute;n.</p>
              <a href="#" class="btn btn-primary">Agregar al carrito</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row text-center mt-4">
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">T&iacute;tulo</h5>
              <p class="card-text">Descripci&oacute;n.</p>
              <a href="#" class="btn btn-primary">Agregar al carrito</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">T&iacute;tulo</h5>
              <p class="card-text">Descripci&oacute;n.</p>
              <a href="#" class="btn btn-primary">Agregar al carrito&nbsp;</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 pb-1 pb-md-0">
          <div class="card">
            <img class="card-img-top" src="images/400X200.gif" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">T&iacute;tulo</h5>
              <p class="card-text">Descripci&oacute;n.</p>
              <a href="#" class="btn btn-primary">Agregar al carrito</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    
    <hr>
    <div class="container">
      <div class="row">
<div class="col-lg-4"> </div>
</div>
    </div>
    <hr>
    <div class="container text-white bg-dark p-4">
      <div class="row">
        <div class="col-6 col-md-8 col-lg-7">
          <div class="row text-center">
            <div class="col-sm-6 col-md-4 col-lg-4 col-12">
              <ul class="list-unstyled">
                <li class="btn-link"> <a>V&iacute;nculo</a> </li>
                <li class="btn-link"> <a>V&iacute;nculo</a> </li>
                <li class="btn-link"> <a>V&iacute;nculo</a> </li>
              </ul>
            </div>
</div>
        </div>
        <div class="col-md-4 col-lg-5 col-6">
          <address>
            <strong>Tu eCommerce</strong><br>
            Av. San Claudio 123<br>
            San Manuel<br>
            Puebla, Puebla, 72570<br>
            <abbr title="Phone">Tel&eacute;fono:</abbr> (222) 123-4567
          </address>
          <address>
            <strong>Atenci&oacute;n al cliente</strong><br>
            <a href="mailto:#">contacto@tuecommerce.com</a>
          </address>
        </div>
      </div>
    </div>
    <footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p>Copyright © Tu eCommerce. Todos los derechos reservados.</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>