<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: catalogue.php');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT idcliente, correo, password FROM cliente WHERE correo = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['idcliente'];
      header("Location: catalogue.php");
    } else {
      $message = 'Correo o contraseña incorrectos';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Iniciar sesion</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos1.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Iniciar sesion</h1>
    <span>o <a href="signup.php">registrarse</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="text" placeholder="ingrese email">
      <input name="password" type="password" placeholder="ingrese contraseña">
      <input type="submit" value="Submit">
    </form>
  </body>
</html>