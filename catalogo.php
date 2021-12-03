<?php
include("direcciones/funciones.php");

if(!empty($_POST['cate'])){
  header("Location: catalogo.php?idcategoria=".$_POST['cate']);
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
  <link rel="stylesheet" href="css/catalogo.css">

  <title>E-commerce</title>
</head>

<body>
  <?php require 'partials/header.php' ?>
  <?php
  if (isset($_GET['idcategoria'])) {
    $idc = $_GET['idcategoria'];
    $recordsd = $conn->prepare('SELECT a.idproducto, a.name, a.imagen, a.precioventa, b.nombrecat FROM producto a INNER JOIN categoria b on a.idcategoria = b.idcategoria AND b.idcategoria = :idc');
    $recordsd->bindParam(':idc', $idc);
    $recordsd->execute();
    $resultsd = $recordsd->fetch(PDO::FETCH_ASSOC);



    if (count($resultsd) > 0) {
      $producto = $resultsd;
    }
  }
  ?>

  <hr class="navegacion">

  <div class="clear"></div>

  <!--   Tarjetas-->
  <div class="title-cards">
    <h2><?php echo $producto['nombrecat'] ?></h2>
    <hr>
  </div>

  <div class="container">
    <div class="categorias">
      <form action="catalogo.php" method="post" id="miformulario" name="miformulario">
        <select onchange="cargar()" class="form-select form-select-sm" aria-label=".form-select-sm example" name="cate">
          <?php
          $sql2 = "select * from categoria";
          $result2 = db_query($sql2);
          $contador = 1;
          while ($row2 = mysqli_fetch_object($result2)) {
          ?>

            <option value="<?php echo $row2->idcategoria ?>" <?php if($row2->idcategoria == $idc){print "selected";}; ?>><?php echo $row2->nombrecat ?></option>

          <?php $contador += 1;
          }
          $result2->close();
          ?>
        </select>
      </form>
    </div>
  </div>


  <div class="container-card">

    <div class="justify-content-center">

      <?php
      $sql = "SELECT a.idproducto, a.name, a.imagen, a.precioventa, a.descripcion, b.nombrecat FROM producto a INNER JOIN categoria b on a.idcategoria = b.idcategoria AND b.idcategoria =" . $idc . "";
      $result = db_query($sql);
      while ($row = mysqli_fetch_object($result)) {
      ?>

        <div class="card d-inline-block">
          <a href="producto.php?idproducto=<?php echo $row->idproducto; ?>" class="link-producto">
            <figure>
              <img src="<?php echo $row->imagen ?>">
            </figure>
          </a>
          <div class="contenido-card">
            <h3><?php echo $row->name ?></h3>
            <p><?php echo $row->descripcion ?></p>
            <p style="font-weight: bold;">$<?php echo $row->precioventa ?></p>
            <a href="carrito.php" class="boton-carrito">Añadir a carrito</a>
          </div>
        </div>
      <?php
      } ?>
    </div>



  </div>


  <div class="clear"></div>

  <?php require 'partials/footer.php' ?>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/d02273941b.js" crossorigin="anonymous"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  <script>
    function cargar() {
      // Una vez cargada la página, el formulario se enviara automáticamente.
      document.forms["miformulario"].submit();
    }
  </script>
</body>

</html>