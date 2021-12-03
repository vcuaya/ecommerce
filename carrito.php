<?php
session_start();

require_once 'conexion/database.php';
$user = null;

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT * FROM cliente WHERE idcliente = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);


  if (count($results) > 0) {
    $user = $results;
  }
}

$carrito = null;

$recordsc = $conn->prepare("SELECT *  FROM pedido where status= 'carrito' and idcliente =" . $user['idcliente'] . "");
$recordsc->execute();
$resultsc = $recordsc->fetch(PDO::FETCH_ASSOC);

if (is_array($resultsc)) {
  if (count($resultsc) > 0) {
    $producto = $resultsc;
  }
}
$total = 0;

if(!empty($_POST['cantidad'])){
    
  $mysql2 = "UPDATE detallepedido SET cantidad=:cantidad WHERE idpedido = :idpedido and idproducto=:idproducto";

  $agregard2 = $conn->prepare($mysql2);


  $agregard2->bindParam(':idpedido', $_POST['idpedido']);
  $agregard2->bindParam(':idproducto', $_POST['idproducto']);
  $agregard2->bindParam(':cantidad', $_POST['cantidad']);
  $agregard2->execute();
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/perfil.css">
  <link rel="stylesheet" href="sweetalert2.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato|Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/perfil_Y_tarjeta.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/carrito.css">

  <title>E-commerce</title>
</head>

<body>
  <nav class="row navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid ">
      <a class="navbar-brand col-md-4 col-lg-5  logo-link" href="index.php">
        <img src="logos/logo_narvar.png" alt="logo" width="52" height="28" class="d-inline-block align-text-top "> E-commerce
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="container-fluid collapse navbar-collapse col-md-4 col-lg-4 col-12 mt-1 mb-1 justify-content-end" id="navbarNavDropdown">
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </form>
      </div>


      <div class="collapse navbar-collapse col-lg-4 justify-content-end barra" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item menu_colapsable">
            <a class="nav-link active " aria-current="page" href="index.php">Inicio</a>
          </li>
          <li class="nav-item menu_colapsable">
            <a class="nav-link" href="carrito.php">Carrito</a>
          </li>
          <li class="nav-item menu_colapsable">
            <a class="nav-link" href="acerca_de.html">Acerca de</a>
          </li>
          <div class="vr"></div>

          <!-- Aqui se aplica la condicion de que si esta logeado muestre el nombre del usuario -->
          <li class="nav-item dropdown menu_colapsable">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ajustes <i class="fas fa-user-circle"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">


              <?php if ($user == NULL) : ?>
                <li><a class="dropdown-item" href="vistas/vistalogin.php">Iniciar Sesión</a></li>
              <?php else : ?>
                <li>
                  <div class="container fw-bold"> Hola <?= $user['user']; ?></div>
                </li>
                <li><a class="dropdown-item" href="perfil.php">Cuenta</a></li>
                <li><a class="dropdown-item" href="logout.php">Salir</a></li>
              <?php endif; ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <hr class="navegacion">

  <div class="clear2"></div>

  <div class="container shadow p-3 mb-5 bg-white rounded">
    <div class="fondo1 p-3 text-white rounded mb-3">
      <h2 class="fw-bold">Carrito</h2>
    </div>
    <div class="row mb-2">
      <div class="col-6">
        <div class="shopping-cart-header">
          <h6>Producto</h6>
        </div>
      </div>
      <div class="col-2">
        <div class="shopping-cart-header">
          <h6 class="text-truncate">Precio</h6>
        </div>
      </div>
      <div class="col-4">
        <div class="shopping-cart-header">
          <h6>Cantidad</h6>
        </div>
      </div>
    </div>

    <form action="carrito.php" method="post" id="miformulario2" name="miformulario2">
      <?php if (!empty($producto)) { ?>
        <?php
        include("direcciones/funciones.php");
        $sql = "SELECT p.idpedido,d.idproducto, d.cantidad, d.subtotal,pr.imagen, pr.precioventa, pr.name FROM pedido AS p INNER JOIN detallepedido AS d ON d.idpedido = p.idpedido INNER JOIN cliente AS c ON p.idcliente = c.idcliente INNER JOIN producto AS pr ON d.idproducto = pr.idproducto AND p.status = 'carrito' AND c.idcliente =" . $user['idcliente'] . "";
        $result = db_query($sql);
        while ($row = mysqli_fetch_object($result)) {
        ?>
          <!--Inicia tarjeta de producto-->
          <div class="container shadow p-3 mb-3 bg-white rounded">
            <div class="row shoppingCartItem">
              <div class="col-6">
                <div class="shopping-cart-item d-flex align-items-center h-100 border-bottom pb-2 pt-3">
                  <img src="<?php echo $row->imagen ?>" class="shopping-cart-image mx-2">
                  <h6 class="shopping-cart-item-title shoppingCartItemTitle text-truncate ml-3 mb-0 "><?php echo $row->name ?></h6>
                </div>
              </div>
              <div class="col-2">
                <div class="shopping-cart-price d-flex align-items-center h-100 border-bottom pb-2 pt-3">
                  <p class="item-price mb-0 shoppingCartItemPrice">$<?php echo $row->precioventa ?></p>
                </div>
              </div>
              <div class="col-4">
                <div class="shopping-cart-quantity d-flex justify-content-between align-items-center h-100 border-bottom pb-2 pt-3">
                  <input type="text" name="idpedido" style="display:none;" value="<?php echo $row->idpedido ?>">
                  <input type="text" name="idproducto" style="display:none;" value="<?php echo $row->idproducto ?>">
                  <input onchange="cargar()" class="shopping-cart-quantity-input shoppingCartItemQuantity" type="number" name="cantidad" value="<?php echo $row->cantidad ?>">
                  <a href="direcciones/borrarArtiCar.php?idproducto=<?php echo $row->idproducto?>&idpedido=<?php echo $row->idpedido?>" class="btn btn-danger buttonDelete">X</a>
                </div>
              </div>
            </div>
          </div>
          <!--Final de tarjeta de producto-->
        <?php $total += $row->precioventa * $row->cantidad;
        }
        $result->close(); ?>
      <?php } else { ?>
        <p class="information">No tiene articulos en su carrito</p>
      <?php } ?>
    </form>
    <!--inicia la parte del total-->
    <div class="row">
      <div class="shopping-cart-total d-flex align-items-center">
        <div class="mb-0"> Total</div>
        <div class="mx-3 mb-0">$<?php print $total; ?></div>
        <button class="btn btn-success ml-auto comprarButton align-items-end" type="button" data-toggle="modal" data-target="#comprarModal">Comprar</button>
      </div>
    </div>
    <!--Final de total-->

    <!--Inicia ventana emergente cuando das en el boton de comprar-->
    <div class="modal fade" id="comprarModal" tabindex="-1" aria-labelledby="comprarModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="comprarModalLabel">Esta a un paso de su compra</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Pronto recibirá su pedido</p>
          </div>
          <div class="modal-footer">
            <a href="direcciones/micarrito.php?idpedido=<?php print $producto['idpedido']; ?>" class="btn btn-primary">Confirmar</a>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <!--final de la ventana emergente-->
  </div>

  <div class="clear"></div>


  <?php require 'partials/footer.php' ?>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/d02273941b.js" crossorigin="anonymous"></script>

  <!-- SCRIPTS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script>
    function cargar() {
      // Una vez cargada la página, el formulario se enviara automáticamente.
      document.forms["miformulario2"].submit();
    }
  </script>
</body>

</html>