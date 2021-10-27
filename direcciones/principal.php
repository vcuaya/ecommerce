<?php
  session_start();

  require '../database.php';
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

      if(count($results2 > 0)){
        $direccion = $results2;
      }
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
    <link rel="stylesheet" href="../assets/css/estilos1.css">
  </head>
  <body>
    <?php require '../partials/header.php' ?>
    <h1 style="display: inline-flex;">Perfil</h1>
    <a style=" display: inline-flex; align-content: right;" href="../editarusuario.php">
      <img style="width: 35px; height: 35px;" src="../images/editar.png">
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

      <?php
        include("funciones.php");
      ?>
      <?php 
        $sql = "select * from direccion where idcliente =" .$user['idcliente']. "" ;
        $result = db_query($sql);
        while($row = mysqli_fetch_object($result)){
        ?>

        <div style="border: gray 2px solid; margin: 30px;">
          Estado: <u><?php echo $row->estado;?></u><br>
          Municipio: <u><?php echo $row->municipio;?></u><br>
          Colonia: <u><?php echo $row->colonia;?></u><br>
          Calle: <u><?php echo $row->calle;?></u><br>
          Numero exterior: <u><?php echo $row->numexterior;?></u><br>
          Numero interior: <u><?php echo $row->numinterior;?></u><br>
          Lote: <u><?php echo $row->lote;?></u><br>
          Manzana: <u><?php echo $row->manzana;?></u><br>
          Edificio: <u><?php echo $row->edificio;?></u><br>
          Numero de piso: <u><?php echo $row->numpiso;?></u><br>
          CP: <u><?php echo $row->cp;?></u><br>

          <a class="btn btn-primary" href="borrar.php?iddireccion=<?php echo $row->iddireccion;?>"><img src="../images/bote-de-basura.png" style="width:20px; height: 20px;"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
        </div>


        <?php } ?>

     <a href="../agregardireccion.php">Agregar direccion nueva</a>

    <?php else: ?>
    <div style="border: gray 2px solid; margin: 30px;">
      <b>No tiene direccion registrada</b>
      <a href="../agregardireccion.php">Agregar direccion</a>
    </div>
    <?php endif; ?>

    <br>
    <a href="../vistas/catalogue.php">
      pagina principal
    </a>


    
  </body>
</html>