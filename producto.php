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

if (isset($_GET['idproducto'])) {
  $idp = $_GET['idproducto'];
  $recordsd = $conn->prepare('SELECT p.idproducto, p.precioventa, p.modelo, p.numparte, p.descripcion, p.alto, p.ancho, p.largo, p.name,p.peso, m.nombremarc FROM producto AS p INNER JOIN marca AS m ON p.idmarca = m.idmarca AND p.idproducto=:idp');
  $recordsd->bindParam(':idp', $idp);
  $recordsd->execute();
  $resultsd = $recordsd->fetch(PDO::FETCH_ASSOC);



  if (count($resultsd) > 0) {
    $producto = $resultsd;
  }
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
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
  <script src="js/jquery.min.js"></script>

  <!----details-product-slider--->
  <!-- Include the Etalage files -->
  <link rel="stylesheet" href="css/etalage.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jquery.etalage.min.js"></script>
  <!-- Include the Etalage files -->
  <script>
    jQuery(document).ready(function($) {

      $('#etalage').etalage({
        thumb_image_width: 350,
        thumb_image_height: 250,


      });
      // This is for the dropdown list example:
      $('.dropdownlist').change(function() {
        etalage_show($(this).find('option:selected').attr('class'));
      });

    });
  </script>
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

  <div></div>




  <div class="shop_top">
    <div class="container">
      <div class="row d-inline">
        <div class="col-md-9 col-lg-9 d-none d-lg-block d-xl-block single_left">
          <div class="single_image">
            <ul id="etalage">
              <?php
              include("direcciones/funciones.php");
              ?>
              <?php
              $sql = "SELECT * FROM imagenes WHERE idproducto= " . $idp . "";
              $result = db_query($sql);
              while ($row = mysqli_fetch_object($result)) {
              ?>
                <li>
                  <img class="etalage_thumb_image" src="<?php echo $row->lugar ?>" />
                  <img class="etalage_source_image" src="<?php echo $row->lugar ?>" />
                </li>
              <?php
              } ?>
            </ul>
          </div>
        </div>
        <!-- termina el slider del producto -->
        <div class="single_right col-md-3 col-lg-3 col-xs-12 ">
          <h3><?= $producto['name']; ?></h3>
          <p class="no_parte text-muted"><?= $producto['numparte']; ?></p>
          <p class="m_10"><?= $producto['descripcion']; ?>
          </p>
          <div class="col-md-5">
            <div class="box-info-product">
              <p class="price2">$<?= $producto['precioventa']; ?></p>
              <form action="direcciones/agregarArt.php" method="post">
                <ul class="prosuct-qty">
                  <span>Cantidad :</span>
                  <input name="idproducto" type="text" value="<?php print $producto['idproducto'] ?>" style="display: none;">
                  <select name="cantidad">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                  </select>
                </ul>
                <div class="btn_form text-center">
                  <input class="btn btn-primary" type="submit" value="Añadir a carrito" title="">


                </div>
              </form>
            </div>
          </div>
          <br>

        </div>
        <div class="clear"> </div>

      </div>
      <div class="desc">
        <h4>Descripción del Producto</h4>
        <p><?= $producto['descripcion']; ?></p>
      </div>

      <div class="clear"> </div>
      <div>
        <h3>Especificaciones</h3>
        <hr>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Categoria</th>
              <th scope="col">Especificación</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Nombre</th>
              <td><?= $producto['name']; ?></td>
            </tr>
            <tr>
              <th scope="row">Marca</th>
              <td><?= $producto['nombremarc']; ?></td>
            </tr>
            <tr>
              <th scope="row">Modelo</th>
              <td colspan="2"><?= $producto['modelo']; ?></td>
            </tr>
            <tr>
              <th scope="row">No.Parte</th>
              <td><?= $producto['numparte']; ?></td>
            </tr>
            <thead>
              <tr>
                <th scope="col">Empaquetado</th>
                <th scope="col">Dimensiones</th>
              </tr>
            </thead>
            <tr>
              <th scope="row">Largo</th>
              <td colspan="2"><?= $producto['largo']; ?></td>
            </tr>
            <tr>
              <th scope="row">Ancho</th>
              <td colspan="2"><?= $producto['ancho']; ?></td>
            </tr>
            <tr>
              <th scope="row">Alto</th>
              <td colspan="2"><?= $producto['alto']; ?></td>
            </tr>
            <tr>
              <th scope="row">Peso</th>
              <td colspan="2"><?= $producto['peso']; ?>kg</td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>
  </div>








  <div class="p-1 fondo-footer">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="index.php" class="nav-link px-2 text-white">Inicio</a></li>
        <li class="nav-item"><a href="carrito.php" class="nav-link px-2 text-white">Carrito</a></li>
        <li class="nav-item"><a href="catalogo.php?idcategoria=1" class="nav-link px-2 text-white">Catálogo</a></li>
        <li class="nav-item"><a href="acerca_de.html" class="nav-link px-2 text-white">Acerca de</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Cuenta</a></li>
      </ul>
      <p class="text-center text-muted">© 2021 E-commerce, Inc</p>
    </footer>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/d02273941b.js" crossorigin="anonymous"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>