<?php
session_start();
require '../conexion/database.php';
$user = null;
$message = '';
if (isset($_SESSION['admin_id'])) {
  $records = $conn->prepare('SELECT * FROM administrador WHERE idadministrador = :id');
  $records->bindParam(':id', $_SESSION['admin_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  if (count($results) > 0) {
    $user = $results;
  }
}



if ($user == null) {
  header("Location: vistalogin.php");
}

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
            $producto = $results2;
            $mysql2 = "INSERT INTO imagenes (idproducto,lugar) VALUES (:idproducto, :lugar)";
            $agregard2 = $conn->prepare($mysql2);
            $agregard2->bindParam(':idproducto', $producto['idproducto']);
            $lu = "hola";
            $agregard2->bindParam(':lugar', $lu);
            if ($agregard2->execute()){
              $message = 'Producto agregada';
            }

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
?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Productos</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/perfil.css">
  <link rel="stylesheet" href="sweetalert2.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato|Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/perfil_Y_tarjeta.css">
</head>

<body style="text-align: center;">


  <h1 style="display: inline-flex;">Productos</h1>
  <a href="../productos/verproductos.php"> Ver productos</a>
  <br>
  <a class="nav-link" href="../logout.php">Cerrar sesion</a>
  <?php if (!empty($message)) : ?>
    <p> <?= $message ?></p>
  <?php else : ?>
    <p style="text-align:center;">Agregando producto por el administrador <b><?= $user['user']; ?></b><br><br></p>
    <div style="border: gray 2px solid; margin: 30px; text-align: left; padding-left: 40%;">

      <form action="agregarProducto.php" method="post" enctype="multipart/form-data">

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
        ID categoria: <input type="text" name="idcategoria" placeholder="ID categoria" required><br>
        ID marca: <input type="text" name="idmarca" placeholder="ID marca" required><br>
        <div class="input-group mb-3">
          <labe>Elija la imgen de presentacion</labe>
          <input type="file" class="form-control" id="imagen" name="imagen">
        </div>
        <div class="input-group mb-3">
          <labe>Elija las imgenes del producto</labe>
          <input type="file" class="form-control" id="imagenes[]" name="imagenes[]" multiple="">
        </div>

        <input type="submit" name="send" value="Agregar">
      </form>
    <?php endif; ?>
    <br>
    </div>

    <form name="MiForm" id="MiForm" method="post" action="../direcciones/cargar.php" enctype="multipart/form-data">
      <h4 class="text-center">Seleccione imagen a cargar</h4>
      <div class="form-group">
        <label class="col-sm-2 control-label">Archivos</label>
        <div class="col-sm-8">
          <input type="file" class="form-control" id="image" name="image" multiple>
        </div>
        <button name="submit" class="btn btn-primary">Cargar Imagen</button>
      </div>
    </form>


    <div class="main">
      <h1>Mostrando imagen almacenada en MySQL</h1>
      <div class="panel panel-primary">
        <div class="panel-body">
          <img src='vista.php?idimagen=10' alt='Img blob desde MySQL' width="600" />
        </div>
      </div>
    </div>


</body>

</html>