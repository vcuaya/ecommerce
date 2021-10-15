<?php
  session_start();

  require 'database.php';
  $user = null;

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT idcliente, correo, password, user, tel, rfc, nombre, segundonombre, paterno, materno, fecharegistro  FROM cliente WHERE idcliente = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);


    if (count($results) > 0) {
      $user = $results;
    }
  }
  if($user==null){
      header("Location: indice.php");
  }
?>



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
      <a href="catalogue.php">
        pagina principal
      </a>
    </div>
  </body>
</html>