<?php
  session_start();
  require '../database.php';
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

  if($user==null){
      header("Location: vistalogin.php");
  }

    if(!empty($_POST['name']) && !empty($_POST['preciocompra']) && !empty($_POST['precioventa']) && !empty($_POST['upc'])&& !empty($_POST['numparte'])&& !empty($_POST['descripcion'])&& !empty($_POST['alto'])&& !empty($_POST['ancho'])&& !empty($_POST['largo'])&& !empty($_POST['idcatalago'])&& !empty($_POST['idcategoria'])&& !empty($_POST['idmarca']) ){

    $mysql = "INSERT INTO producto (name, preciocompra, precioventa, upc, numparte, descripcion, alto, ancho, largo, idcatalago, idcategoria, idmarca) VALUES (:name, :preciocompra, :precioventa, :upc, :numparte, :descripcion, :alto, :ancho, :largo, :idcatalago, :idcategoria, :idmarca)";

    $agregard = $conn->prepare($mysql);

    $agregard->bindParam(':name',$_POST['name']);
    $agregard->bindParam(':preciocompra',$_POST['preciocompra']);
    $agregard->bindParam(':precioventa',$_POST['precioventa']);
    $agregard->bindParam(':upc',$_POST['upc']);
    $agregard->bindParam(':numparte',$_POST['numparte']);
    $agregard->bindParam(':descripcion',$_POST['descripcion']);
    $agregard->bindParam(':alto',$_POST['alto']);
    $agregard->bindParam(':ancho',$_POST['ancho']);
    $agregard->bindParam(':largo',$_POST['largo']);
    $agregard->bindParam(':idcatalago',$_POST['idcatalago']);
    $agregard->bindParam(':idcategoria',$_POST['idcategoria']);
    $agregard->bindParam(':idmarca',$_POST['idmarca']);
    


    if ($agregard->execute()){
      $message = 'Producto agregada';
    }else{
      $message = 'Error al guardar producto';
    }
  }
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Productos</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
  </head>
  <body style="text-align: center;">
    <?php require '../partials/header.php' ?>

    <h1 style="display: inline-flex;">Productos</h1>
    <a href="../productos/verproductos.php"> Ver productos</a>
    <br>
    <a class= "nav-link" href="../logout.php">Cerrar sesion</a>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php else: ?>
    	<p style="text-align:center;">Agregando producto por el administrador <b><?= $user['user']; ?></b><br><br></p>
      <div style="border: gray 2px solid; margin: 30px; text-align: left; padding-left: 40%;">
        
        <form action="agregarProducto.php" method="post">

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

          <input type="submit" name="send" value="Agregar">
        </form>
    <?php endif; ?>
      <br>
    </div>

  </body>
</html>
