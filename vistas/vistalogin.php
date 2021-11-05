<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
  }
  if (isset($_SESSION['admin_id'])) {
    header('Location: agregarProducto.php');
  }

  require '../conexion/database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $results = NULL;
    $records = $conn->prepare('SELECT idcliente, correo, password FROM cliente WHERE correo = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $contra = $_POST['password'];


    $message = '';
    $value = false;

    if($results != NULL){
      $value = password_verify($contra, $results['password']);
      if($value == true){
        $_SESSION['user_id'] = $results['idcliente'];
        header("Location: ../index.php");
      }else {
          $message = 'Correo o contraseña incorrectos';
        }
    } else {

      $results2 = NULL;
      $records2 = $conn->prepare('SELECT idadministrador, correo, password FROM administrador WHERE correo = :email');
      $records2->bindParam(':email', $_POST['email']);
      $records2->execute();
      $results2 = $records2->fetch(PDO::FETCH_ASSOC);
      $results3 = $records2->fetch(PDO::FETCH_ASSOC);
      $value2=false;

      $message = '';


      if($results2 != NULL){
        
        if(password_verify($_POST['password'], $results2['password'])){
          $_SESSION['admin_id'] = $results2['idadministrador'];
          header("Location: agregarProducto.php");
          $message='Datos correctos';

        }else {
            $message = 'Correo o contraseña del administrador incorrectos';
          }
      }else{
        $message='Correo no encontrado';
      }
    }
  }
?>


<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/inicio_sesion.css">

  <title>E-commerce</title>
</head>

<body class="bg-ligth">
  <section>
    <div class="row g-0">
      <div class="col-lg-7 d-none d-lg-block">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item img-1 min-vh-100 active">
              <div class="carousel-caption d-none d-md-block">
                <h5 class="font-weight-bold text-dark">Todo lo que necesites</h5>
                <a href="../index.php" class="text-decoration-none">Visita nuestra tienda</a>
              </div>
            </div>
            <div class="carousel-item img-2 min-vh-100">
              <div class="carousel-caption d-none d-md-block">
                <h5 class="font-weight-bold text-dark">Los mejores precios</h5>
                <a href="#" class="text-decoration-none">Visita nuestra tienda</a>
              </div>
            </div>
            <div class="carousel-item img-3 min-vh-100">
              <div class="carousel-caption d-none d-md-block">
                <h5 class="font-weight-bold text-dark">Envios Rapidos y Seguros</h5>
                <a href="#" class="text-decoration-none">Visita nuestra tienda</a>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100">
        <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 mb-auto">
          <img src="../logos/logo.png" alt="logo" class="img-fluid">
        </div>
        <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
          <h1 class="font-weight-bold mb-4"><b>Bienvenido de vuelta</b></h1>
          <form action="vistalogin.php" method="POST">
            <div class="mb-4">
              <label for="exampleInputEmail1" class="form-label font-weight-bold cuenta">Email</label>
              <input name = "email" type="email" class="form-control bg-light-x border-0" placeholder="Ingresa tu Email"
                id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-4">
              <label for="exampleIputPassword1" class="form-label font-weight-bold cuenta">Contraseña</label>
              <input name = "password" type="password" class="form-control bg-light-x border-0 mb-2" placeholder="Ingresa tu contraseña"
                id="exampleInputPassword1">
              <a href="#" id="emailHelp" class="form-text text-muted text-decoration-none cuenta1">¿Has olvidado tu
                contraseña?</a>
            </div>
              <?php if(!empty($message)): ?>
                <div style="color: white; text-align:center; background-color:red; border-radius: 5px;"><p style="font-weight:bold;"> <?= $message ?></p></div>
              <?php endif; ?>
            <button type="submit" class="btn btn-primary w-100 cuenta">Iniciar Sesion</button>
          </form>
        </div>

        <div class="text-center px-ñg-5 pt-lg-3 pb-lg-4 p-4 w-100 mt-auto">
          <p class="d-inline-block mb-0">¿Todavía no tienes una cuenta?</p>
          <a href="signup.php" class="text-dark font-weight-bold text-decoration-none cuenta1">Crear una ahora</a>
        </div>

      </div>
    </div>
  </section>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>