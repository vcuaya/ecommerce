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

  if(!empty($_POST['estado']) || !empty($_POST['municipio']) || !empty($_POST['colonia']) || !empty($_POST['calle']) || !empty($_POST['numexterior']) || !empty($_POST['cp']) || !empty($_POST['numinterior']) || !empty($_POST['lote']) || !empty($_POST['manzana']) || !empty($_POST['edificio']) || !empty($_POST['numpiso'])){


    $sql = "INSERT INTO direccion (idcliente,estado,municipio,colonia,calle,numexterior,numinterior,lote,manzana,edificio,numpiso,cp) VALUES (:id,:estado,:municipio,:colonia,:calle,:numexterior,:numinterior,:lote,:manzana,:edificio,:numpiso,:cp)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id',$user["idcliente"]);
    $stmt->bindParam(':estado',$_POST['estado']);
    $stmt->bindParam(':municipio',$_POST['municipio']);
    $stmt->bindParam(':colonia',$_POST['colonia']);
    $stmt->bindParam(':calle',$_POST['calle']);
    $stmt->bindParam(':numexterior',$_POST['numexterior']);
    $stmt->bindParam(':numinterior',$_POST['numinterior']);
    $stmt->bindParam(':lote',$_POST['lote']);
    $stmt->bindParam(':manzana',$_POST['manzana']);
    $stmt->bindParam(':edificio',$_POST['edificio']);
    $stmt->bindParam(':numpiso',$_POST['numpiso']);
    $stmt->bindParam(':cp',$_POST['cp']);


    if ($stmt->execute()){
      $message = 'Direccion agregada';
    }else{
      $message = 'Error al guardar direccion';
    }

  }

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Direccion</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    
  </head>
  <body style="text-align: center;">
    <?php require 'partials/header.php' ?>

    <h1 style="display: inline-flex;">Direccion</h1>
    <a style=" display: inline-flex; align-content: right;" href="verusuario.php">
      <img style="width: 35px; height: 35px;" src="images/tache.png">
    </a><br>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php else: ?>
      <div style="border: gray 2px solid; margin: 30px; text-align: left; padding-left: 40%;">
        Agregando direccion de <b><?= $user['user']; ?></b><br><br>
        <form action="agregardireccion.php" method="post">
          Estado: <input type="text" name="estado" placeholder="Estado"><br>
          Municipio: <input type="text" name="municipio" placeholder="Municipio"><br>
          Colonia: <input type="text" name="colonia" placeholder="Colonia"><br>
          Calle: <input type="text" name="calle" placeholder="Calle"><br>
          Numero exterior: <input type="numexterior" name="nombre" placeholder="Numero exterior"><br>
          Numero interior: <input type="numinterior" name="segundonombre" placeholder="Numero interior"><br>
          Lote: <input type="text" name="lote" placeholder="Lote"><br>
          Manzana: <input type="text" name="manzana" placeholder="Manzana"><br>
          Edificio: <input type="text" name="edificio" placeholder="Edificio"><br>
          Numero de piso: <input type="text" name="numpiso" placeholder="Numero de piso"><br>
          CP: <input type="text" name="cp" placeholder="CP"><br>
          <input type="submit" name="send" value="Agregar">
        </form>
    <?php endif; ?>
      <br>
    </div>
  </body>
</html>