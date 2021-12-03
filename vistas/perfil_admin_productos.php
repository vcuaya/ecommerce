<?php require '../partials/headeradmin.php' ?>
<link rel="stylesheet" href="../css/catalogo.css">
<?php
include("../direcciones/funciones.php");

if ($admin == null) {
  header("Location: vistalogin.php");
}

if (!empty($_POST['cate'])) {
  header("Location: perfil_admin_productos.php?idcategoria=" . $_POST['cate']);
}
$idc = null;
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

<div class="container row">
  <?php require '../partials/navegacionadmin.php' ?>

  <div class="col-lg-9">

    <div class="container shadow p-3 mb-5 bg-body rounded">
      <div class="fondo1 p-3 text-white rounded ">
        <h2 class="fw-bold">Productos</h2>
      </div>
      <hr>
      <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1 row">
        <?php if ($idc != null) { ?>
          <div class="container">
            <div class="categorias">
              <form action="perfil_admin_productos.php" method="post" id="miformulario" name="miformulario">
                <select onchange="cargar()" class="form-select form-select-sm" aria-label=".form-select-sm example" name="cate">
                  <?php
                  $sql2 = "select * from categoria";
                  $result2 = db_query($sql2);
                  $contador = 1;
                  while ($row2 = mysqli_fetch_object($result2)) {
                  ?>

                    <option value="<?php echo $row2->idcategoria ?>" <?php if ($row2->idcategoria == $idc) {
                                                                        print "selected";
                                                                      }; ?>><?php echo $row2->nombrecat ?></option>

                  <?php $contador += 1;
                  }
                  $result2->close();
                  ?>
                </select>
              </form>
            </div>
          </div>
          <?php
          $sql = "SELECT a.idproducto, a.name, a.imagen, a.precioventa, a.descripcion, b.nombrecat FROM producto a INNER JOIN categoria b on a.idcategoria = b.idcategoria AND b.idcategoria =" . $idc . "";
          $result = db_query($sql);
          while ($row = mysqli_fetch_object($result)) {
          ?>

            <div class="card d-inline-block">
              <a href="producto.php?idproducto=<?php echo $row->idproducto; ?>" class="link-producto">
                <figure>
                  <img src="../<?php echo $row->imagen ?>">
                </figure>
              </a>
              <div class="contenido-card">
                <h3><?php echo $row->name ?></h3>
                <p><?php echo $row->descripcion ?></p>
                <p style="font-weight: bold;">$<?php echo $row->precioventa ?></p>
                <a href="../direcciones/borrarProducto.php?idproducto=<?php echo $row->idproducto ?>" class="btn btn-danger">Borrar</a>
              </div>
            </div>
          <?php
          } ?>
        <?php } else { ?>
          <div class="container">
            <div class="categorias">
              <form action="perfil_admin_productos.php" method="post" id="miformulario" name="miformulario">
                <select onchange="cargar()" class="form-select form-select-sm" aria-label=".form-select-sm example" name="cate">
                  <option></option>
                  <?php
                  $sql2 = "select * from categoria";
                  $result2 = db_query($sql2);
                  $contador = 1;
                  while ($row2 = mysqli_fetch_object($result2)) {
                  ?>

                    <option value="<?php echo $row2->idcategoria ?>"> <?php echo $row2->nombrecat ?></option>

                  <?php $contador += 1;
                  }
                  $result2->close();
                  ?>
                </select>
              </form>
            </div>
          </div>

          <?php
          $sql = "SELECT a.idproducto, a.name, a.imagen, a.precioventa, a.descripcion, b.nombrecat FROM producto a INNER JOIN categoria b on a.idcategoria = b.idcategoria";
          $result = db_query($sql);
          while ($row = mysqli_fetch_object($result)) {
          ?>

            <div class="card d-inline-block">
              <a href="producto.php?idproducto=<?php echo $row->idproducto; ?>" class="link-producto">
                <figure>
                  <img src="../<?php echo $row->imagen ?>">
                </figure>
              </a>
              <div class="contenido-card">
                <h3><?php echo $row->name ?></h3>
                <p><?php echo $row->descripcion ?></p>
                <p style="font-weight: bold;">$<?php echo $row->precioventa ?></p>
                <a href="../direcciones/borrarProducto.php?idproducto=<?php echo $row->idproducto ?>" class="btn btn-danger">Borrar</a>
              </div>
            </div>
          <?php
          } ?>
        <?php } ?>

      </div>
      <div><a href="perfil_admin_productos_nuevo.php">Agregar nuevo producto</a></div>
    </div>



  </div>
</div>
</div>

<script>
  function cargar() {
    // Una vez cargada la página, el formulario se enviara automáticamente.
    document.forms["miformulario"].submit();
  }
</script>
<?php require '../partials/footeradmin.php' ?>