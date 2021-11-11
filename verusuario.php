<?php
  session_start();

  require 'conexion/database.php';
  $user = null;
  $direccion = null;

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT idcliente, correo, password, user, tel, rfc, nombre, segundonombre, paterno, materno, fecharegistro  FROM cliente WHERE idcliente = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    if (count($results) > 0) {
      $user = $results;

      $records2 = $conn->prepare('SELECT iddireccion, idcliente, estado, municipio, colonia, calle, numexterior, numinterior, lote, manzana, edificio, numpiso, cp  FROM direccion WHERE idcliente = :id');
      $records2->bindParam(':id', $user['idcliente']);
      $records2->execute();
      $results2 = $records2->fetch(PDO::FETCH_ASSOC);

      if(count($results2) > 0){
        $direccion = $results2;
      }
    }
  }
  if($user==null){
      header("Location: indice.php");
  }


  

?>

"DELETE FROM `direccion` WHERE `direccion`.`iddireccion` = 7"

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Perfil de usuario</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos1.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>
    <h1 style="display: inline-flex;">Perfil</h1>
    <a style=" display: inline-flex; align-content: right;" href="editarusuario.php">
      <img style="width: 35px; height: 35px;" src="images/editar.png">
    </a>
    <div style="border: gray 2px solid; margin: 30px;">
      Hola de nuevo <b><?= $user['user']; ?></b><br><br>
      
      Correo: <u><?= $user['correo']; ?></u><br>
      Nombre de usuario: <u><?= $user['user']; ?></u><br>
      Telefono celular: <u><?= $user['tel']; ?></u><br>
      RFC: <u><?= $user['rfc']; ?></u><br>
      Nombre: <u><?= $user['nombre']; ?></u><br>
      Segundo nombre: <u><?= $user['segundonombre']; ?></u><br>
      Apellido paterno: <u><?= $user['paterno']; ?></u><br>
      Apellido materno: <u><?= $user['materno']; ?></u><br>

      <br>
    </div>

    <?php if(!empty($direccion)): ?>
      <div style="border: gray 2px solid; margin: 30px;">
        Direccion</b><br><br>
        
        Estado: <u><?= $direccion['estado']; ?></u><br>
        Municipio: <u><?= $direccion['municipio']; ?></u><br>
        Colonia: <u><?= $direccion['colonia']; ?></u><br>
        Calle: <u><?= $direccion['calle']; ?></u><br>
        Numero exterior: <u><?= $direccion['numexterior']; ?></u><br>
        Numero interior: <u><?= $direccion['numinterior']; ?></u><br>
        Lote: <u><?= $direccion['lote']; ?></u><br>
        Manzana: <u><?= $direccion['manzana']; ?></u><br>
        Edificio: <u><?= $direccion['edificio']; ?></u><br>
        Numero de piso: <u><?= $direccion['numpiso']; ?></u><br>
        CP: <u><?= $direccion['cp']; ?></u><br>

              <form action="verusuario.php" method="post">
        <input type="button" name="eliminar" value="Eliminar direccion">
      </form>

     </div>
     <a href="agregardireccion.php">Agregar direccion nueva</a>


    <?php else: ?>
    <div style="border: gray 2px solid; margin: 30px;">
      <b>No tiene direccion registrada</b>
      <a href="agregardireccion.php">Agregar direccion</a>
    </div>
    <?php endif; ?>

    <br>
    <a href="vistas/catalogue.php">
      pagina principal
    </a>


    
  </body>
</html>