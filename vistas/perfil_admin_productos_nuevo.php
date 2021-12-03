<?php
require '../conexion/database.php';
$message = '';


if (!empty($_POST['name']) && !empty($_POST['preciocompra']) && !empty($_POST['precioventa']) && !empty($_POST['upc']) && !empty($_POST['numparte']) && !empty($_POST['descripcion']) && !empty($_POST['alto']) && !empty($_POST['ancho']) && !empty($_POST['largo']) && !empty($_POST['idcatalago']) && !empty($_POST['idcategoria']) && !empty($_POST['idmarca'])) {
  if ($_FILES["imagen"]) {
    $nombre_base = basename($_FILES["imagen"]["name"]);
    $nombre_final = date("m-d-y") . "-" . date("H-i-s") . "-" . $nombre_base;
    $ruta = "../images/imgpro/" . $nombre_final;
    $ruta2 = "images/imgpro/" . $nombre_final;
    $subirarchivo = move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
    if ($subirarchivo) {
      $mysql = "INSERT INTO producto (name, preciocompra, precioventa, upc, numparte, descripcion, alto, ancho, largo, idcatalago, idcategoria, idmarca, imagen) VALUES (:name, :preciocompra, :precioventa, :upc, :numparte, :descripcion, :alto, :ancho, :largo, :idcatalago, :idcategoria, :idmarca, :imagen)";

      $agregard = $conn->prepare($mysql);

      $agregard->bindParam(':name', $_POST['name']);
      $agregard->bindParam(':preciocompra', $_POST['preciocompra']);
      $agregard->bindParam(':precioventa', $_POST['precioventa']);
      $agregard->bindParam(':upc', $_POST['upc']);
      $agregard->bindParam(':numparte', $_POST['numparte']);
      $agregard->bindParam(':descripcion', $_POST['descripcion']);
      $agregard->bindParam(':alto', $_POST['alto']);
      $agregard->bindParam(':ancho', $_POST['ancho']);
      $agregard->bindParam(':largo', $_POST['largo']);
      $agregard->bindParam(':idcatalago', $_POST['idcatalago']);
      $agregard->bindParam(':idcategoria', $_POST['idcategoria']);
      $agregard->bindParam(':idmarca', $_POST['idmarca']);
      $agregard->bindParam(':imagen', $ruta2);



      if ($agregard->execute()) {

        $records2 = $conn->prepare('SELECT *  FROM producto WHERE name = :nombrepro and preciocompra = :preciocompra and precioventa=:precioventa');
        $records2->bindParam(':nombrepro', $_POST['name']);
        $records2->bindParam(':preciocompra',  $_POST['preciocompra']);
        $records2->bindParam(':precioventa',  $_POST['precioventa']);
        $records2->execute();
        $results2 = $records2->fetch(PDO::FETCH_ASSOC);

        if (is_array($results2)) {
          if (count($results2) > 0) {
            foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {
              if ($_FILES['imagenes']['name'][$key]) {
                $filename = $_FILES['imagenes']['name'][$key];
                $temporal = $_FILES['imagenes']['tmp_name'][$key];
                $directorio = "../images/imgpro/";
                $directorio2 = "images/imgpro/";

                $filename_final = date("m-d-y") . "-" . date("H-i-s") . "-" . $filename;

                $ruta = $directorio . $filename_final;
                $ruta2 = $directorio2 . $filename_final;
                if (move_uploaded_file($temporal, $ruta)) {
                  $producto = $results2;
                  $mysql2 = "INSERT INTO imagenes (idproducto,lugar) VALUES (:idproducto, :lugar)";
                  $agregard2 = $conn->prepare($mysql2);
                  $agregard2->bindParam(':idproducto', $producto['idproducto']);
                  $agregard2->bindParam(':lugar', $ruta2);
                  $agregard2->execute();
                } else {
                  $message = 'Error en cargar un archivo';
                }
              }
              $message = 'Todo perfecto';
            }
          }
        } else {
          $message = 'Error al guardar producto';
        }
      } else {
        $message = "Error al subir el archivo";
      }
    }
  }
}

?>
<?php require '../partials/headeradmin.php' ?>
<?php
if ($admin == null) {
  header("Location: vistalogin.php");
}
?>

<div class="container row">
  <?php require '../partials/navegacionadmin.php' ?>

  <div class="col-lg-9">

    <div class="container shadow p-3 mb-5 bg-body rounded">
      <div class="fondo1 p-3 text-white rounded ">
        <h2 class="fw-bold">Nuevo producto</h2>
      </div>
      <hr>
      <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1 row">
        <div class="container">
          <?php if (!empty($message)) : ?>
            <p> <?= $message ?></p>
          <?php else : ?>
            <p>Agregando producto por el administrador <b><?= $admin['user']; ?></b><br><br></p>
            <div>

              <form action="perfil_admin_productos_nuevo.php" method="post" enctype="multipart/form-data">

                Nombre: <input type="text" name="name" placeholder="Nombre del producto" required><br>
                Precio de compra: <input type="text" name="preciocompra" placeholder="Precio de compra" required><br>
                Precio de venta: <input type="text" name="precioventa" placeholder="Precio de venta" required><br>
                UPC: <input type="text" name="upc" placeholder="UPC"><br>
                Numero de parte: <input type="text" name="numparte" placeholder="Numero de parte" required><br>
                Descripcion: <input type="text" name="descripcion" placeholder="Descripcion" required><br>
                Alto: <input type="text" name="alto" placeholder="ALto (cm)"><br>
                Ancho: <input type="text" name="ancho" placeholder="Ancho (cm)"><br>
                Largo: <input type="text" name="largo" placeholder="Largo (cm)"><br>
                ID catalago: <input type="text" name="idcatalago" placeholder="ID catalago" required><br>
                <?php
                include("../direcciones/funciones.php");
                ?>

                Elija la categoria
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="idcategoria">
                  <?php
                  $sql = "select * from categoria";
                  $result = db_query($sql);
                  $contador = 1;
                  while ($row = mysqli_fetch_object($result)) {
                  ?>

                    <option value="<?php echo $row->idcategoria ?>"><?php echo $row->nombrecat ?></option>

                  <?php $contador += 1;
                  }
                  $result->close();
                  ?>
                </select>
                Elija la marca
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="idmarca">
                  <?php
                  $sql2 = "select * from marca";
                  $result2 = db_query($sql2);
                  $contador = 1;
                  while ($row2 = mysqli_fetch_object($result2)) {
                  ?>

                    <option value="<?php echo $row2->idmarca ?>"><?php echo $row2->nombremarc ?></option>

                  <?php $contador += 1;
                  }
                  $result2->close();
                  ?>
                </select>
                <div class="input-group mb-3">
                  <labe>Elija la imagen de presentacion</labe>
                  <input type="file" class="form-control" id="imagen" name="imagen">
                </div>
                <div class="input-group mb-3">
                  <labe>Elija las imagenes del producto</labe>
                  <input type="file" class="form-control" id="imagenes[]" name="imagenes[]" multiple="">
                </div>
            </div>

            <input type="submit" name="send" value="Agregar">
            </form>
          <?php endif; ?>
          <br>
        </div>

      </div>
    </div>


  </div>
</div>
</div>


<?php require '../partials/footeradmin.php' ?>