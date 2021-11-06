<?php
  session_start();

  require '../database.php';
  $user = null;
  $producto = null;

  if (isset($_SESSION['admin_id'])) {
    $records = $conn->prepare('SELECT *  FROM administrador WHERE idadministrador = :id');
    $records->bindParam(':id', $_SESSION['admin_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    if (count($results) > 0) {
      $user = $results;

      $records2 = $conn->prepare('SELECT *  FROM producto');
      $records2->execute();
      $results2 = $records2->fetch(PDO::FETCH_ASSOC);

      if(count($results2 > 0)){
        $producto = $results2;
      }
    }
  }
  if($user==null){
      header("Location: ../vistalogin.php");
  }


  





?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Productos</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/estilos1.css">
  </head>
  <body>
    <?php require '../partials/header.php' ?>
    <h1 style="display: inline-flex;">Productos</h1>
    <a style=" display: inline-flex; align-content: right;" href="../vistas/agregarproducto.php">
      + productos
    </a>
    <div style="border: gray 2px solid; margin: 30px;">
      Hola de nuevo <b><?= $user['user']; ?></b><br><br>
    </div>

    <?php if(!empty($producto)): ?>

      <?php
        include("funciones.php");
      ?>
      <?php 
        $sql = "select * from producto" ;
        $result = db_query($sql);
        while($row = mysqli_fetch_object($result)){
        ?>

        <div style="border: gray 2px solid; margin: 30px;">

          Nombre: <u><?php echo $row->name;?></u><br>
          Precio de compra: <u><?php echo $row->preciocompra;?></u><br>
          Precio de venta: <u><?php echo $row->precioventa;?></u><br>
          UPC: <u><?php echo $row->upc;?></u><br>
          Numero de parte: <u><?php echo $row->numparte;?></u><br>
          Descripcion: <u><?php echo $row->descripcion;?></u><br>
          Alto: <u><?php echo $row->alto;?></u><br>
          Ancho: <u><?php echo $row->ancho;?></u><br>
          Largo: <u><?php echo $row->largo;?></u><br>
          ID catalago: <u><?php echo $row->idcatalago;?></u><br>
          ID categoria: <u><?php echo $row->idcategoria;?></u><br>
          ID marca: <u><?php echo $row->idmarca;?></u><br>

          <a class="btn btn-primary" href="borrar.php?idproducto=<?php echo $row->idproducto;?>"><img src="../images/bote-de-basura.png" style="width:20px; height: 20px;"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
        </div>


        <?php } ?>


    <?php else: ?>
    <div style="border: gray 2px solid; margin: 30px;">
      <b>No tiene ningun producto</b>
      <a href="../vistas/agregarproducto.php">Agregar nuevos productos</a>
    </div>
    <?php endif; ?>


    
  </body>
</html>