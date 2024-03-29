<?php require 'partials/header.php' ?>
<?php
$categorias = null;

$recordsc = $conn->prepare('SELECT *  FROM categoria');
$recordsc->execute();
$resultsc = $recordsc->fetch(PDO::FETCH_ASSOC);

if (is_array($resultsc)) {
  if (count($resultsc) > 0) {
    $categorias = $resultsc;
  }
}
?>
<form class="form-inline my-2 my-lg-0">
  <div class="container mt-3">
    <div class="row">
      <div class="col-12">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="images/portada5.jpg" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>Banner 1 Heading</h5>
                <p>Banner 1 Descripci&oacute;n</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/portada3.jpg" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>Banner 2 Heading</h5>
                <p>Banner 2 Descripci&oacute;n</p>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="images/portada4.png" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
                <h5>Banner 3 Heading</h5>
                <p>Banner 3 Descripci&oacute;n</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
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
  <h2 class="text-center">CATEGORIAS</h2>
  <hr>




  <div class="container w-75">
    <?php if (!empty($categorias)) : ?>

      <?php
      include("direcciones/funciones.php");
      ?>
      <?php
      $sql = "select * from categoria";
      $result = db_query($sql);
      $contador = 1;
      while ($row = mysqli_fetch_object($result)) {
      ?>
        <div class="text-center  mb-4">
          <div>
            <a class="w-10" href="catalogo.php?idcategoria=<?php echo $row->idcategoria; ?>" style="text-decoration: none;">
              <div class="card" style="    background-size: cover; background-position: center ; background-image: url('<?php echo $row->imagen ?>')">
                <div class="card-body" style="background-color: rgba(0,0,0,0.5);">
                  <br>
                  <h5 class="card-title" style="font-weight: bold; color: white;"><?php echo $row->nombrecat; ?></h5>
                  <p class="card-text" style=" color: white;"><?php echo $row->descripcion; ?></p>
                  <br>
                </div>
              </div>
            </a>

          </div>
        </div>
      <?php $contador += 1;
      }
      $result->close();
      ?>

    <?php else : ?>
      <div style="border: gray 2px solid; margin: 30px;">
        sin categorias
      </div>
    <?php endif; ?>

  </div>
  <hr>
</form>
<?php require 'partials/footer.php' ?>