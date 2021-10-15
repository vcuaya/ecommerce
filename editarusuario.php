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



  $message = '';

  if(!empty($_POST['correo']) || !empty($_POST['user'])  || !empty($_POST['tel']) || !empty($_POST['rfc']) || !empty($_POST['nombre']) || !empty($_POST['segundonombre']) || !empty($_POST['paterno']) || !empty($_POST['materno'])){
    
    $sql = "UPDATE cliente SET correo= :correo, user= :user, tel=:tel, rfc=:rfc, nombre=:nombre, segundonombre=:segundonombre, paterno=:paterno, materno=:materno WHERE idcliente = :id";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id',$user["idcliente"]);
    $correosinespacio = preg_replace('/\s+/', '', $_POST['correo']); 
    $stmt->bindParam(':correo',$correosinespacio);
    $stmt->bindParam(':user',$_POST['user']);
    $stmt->bindParam(':tel',$_POST['tel']);
    $stmt->bindParam(':rfc',$_POST['rfc']);
    $stmt->bindParam(':nombre',$_POST['nombre']);
    $stmt->bindParam(':segundonombre',$_POST['segundonombre']);
    $stmt->bindParam(':paterno',$_POST['paterno']);
    $stmt->bindParam(':materno',$_POST['materno']);

    if ($stmt->execute()){
    $message = 'Cambios guardados';
    }else{
    $message = 'Error al guardar cambios';
    }

  }

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Perfil de usuario</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
  </head>
  <body style="text-align: center;">
    <?php require 'partials/header.php' ?>
    <h1 style="display: inline-flex;">Perfil</h1>
    <a style=" display: inline-flex; align-content: right;" href="verusuario.php">
      <img style="width: 35px; height: 35px;" src="images/tache.png">
    </a><br>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php else: ?>
      <div style="border: gray 2px solid; margin: 30px; text-align: left; padding-left: 40%;">
        Editando usuario <b><?= $user['user']; ?></b><br><br>
        <form action="editarusuario.php" method="post">
          Correo: <input type="text" name="correo" placeholder="Correo electronico" value="<?= $user['correo']; ?>"><br>
          Nombre de usuario: <input type="text" name="user" placeholder="Nombre de usuario" value="<?= $user['user']; ?>"><br>
          Telefono celular: <input type="text" name="tel" placeholder="Numero celular" value="<?= $user['tel']; ?>"><br>
          RFC: <input type="text" name="rfc" placeholder="RFC" value="<?= $user['rfc']; ?>"><br>
          Nombre: <input type="text" name="nombre" placeholder="Nombre" value="<?= $user['nombre']; ?>"><br>
          Segundo nombre: <input type="text" name="segundonombre" placeholder="Segundo nombre" value="<?= $user['segundonombre']; ?>"><br>
          Apellido paterno: <input type="text" name="paterno" placeholder="Apellido paterno" value="<?= $user['paterno']; ?>"><br>
          Apellido materno: <input type="text" name="materno" placeholder="Apellido materno" value="<?= $user['materno']; ?>"><br>
          <input type="submit" name="send" value="Guardar cambios">
        </form>
    <?php endif; ?>
      <br>
    </div>
  </body>
</html>