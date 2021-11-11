<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT idcliente, correo, password, user FROM cliente WHERE idcliente = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
      header("Location: catalogue.php");
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Bienvenido a tu WebApp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos1.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido. <?= $user['user']; ?>
      <br>Inició sesion exitosamente
      <a href="logout.php">
        Cerrar sesion
      </a>
    <?php else: ?>
      <h1>Inicie sesion o registrese</h1>

      <a href="login.php">Iniciar sesion</a> or
      <a href="signup.php">Registrarse</a>
    <?php endif; ?>
  </body>
</html>