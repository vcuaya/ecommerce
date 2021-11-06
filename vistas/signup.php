
<?php

  require '../conexion/database.php';

  $message = '';

  if(!empty($_POST['user']) && !empty($_POST['correo']) && !empty($_POST['nombre']) && !empty($_POST['paterno']) && !empty($_POST['password'])){
    
    $sql = "INSERT INTO cliente (correo, password, user, nombre, paterno) VALUES (:correo, :password, :user, :nombre, :paterno)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':correo',$_POST['correo']);

    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt->bindParam(':password',$password);
    $stmt->bindParam(':user',$_POST['user']);
    $stmt->bindParam(':nombre',$_POST['nombre']);
    $stmt->bindParam(':paterno',$_POST['paterno']);

    if ($stmt->execute()){
    $message = 'Cuenta creada con exito';
    }else{
    $message = 'Error al crear cuenta';
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
  <link rel="stylesheet" href="../css/registrarse.css">

  <title>E-commerce</title>
</head>

<body>
  <div class="justify-content-center centrar p-3">
    <h1 class="font-weight-bold mb-4"><b>Crea una cuenta gratis</b></h1>

    <?php if(!empty($message)): ?>
      <div style="background-color: #00bb2d; width: 80%; color: white; margin: auto; border-radius: 8px; font-size: 30px; text-align:center;">
        <p style="font-weight: bold"> <?= $message ?></p>
      </div>
    <?php endif; ?>
    <form class="row g-3" action="signup.php" method="post">
      <div class="col-md-6 mb-4">
        <label for="validationDefault01" class="form-label">Nombre</label>
        <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2"><i class="far fa-user"></i></span>
        <input type="text" class="form-control" id="validationDefault01" placeholder="Nombre..." name="nombre" required>
        </div>
      </div>
      <div class="col-md-6">
        <label for="validationDefault02" class="form-label">Apellido</label>
        <div class="input-group">
          <span class="input-group-text" id="inputGroupPrepend2"><i class="far fa-user"></i></span>
          <input type="text" class="form-control" id="validationDefault02" placeholder="Apellido..."  name="paterno" required>
        </div>  
      </div>
        <div class="col-md-5 mb-4">
          <label for="validationDefaultUsername" class="form-label">Usuario</label>
          <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-user-tag"></i></span>
            <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Usuario..."  name="user" aria-describedby="inputGroupPrepend2"
              required>
          </div>
        </div>
        <div class="col-md-7">
          <label for="exampleInputEmail1" class="form-label font-weight-bold cuenta">Email</label>
          <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2"><i class="far fa-envelope"></i></span>
          <input type="email" class="form-control bg-light-x border-i" id="validationDefault03" placeholder="Ingresa tu Email..."
            id="exampleInputEmail1" aria-describedby="emailHelp" name="correo" required></div>
        </div>
      

  
      <div class="col-md-4 mb-4">
        <label for="exampleIputPassword1" class="form-label font-weight-bold cuenta">Contraseña</label>
        <div class="input-group">
        <span class="input-group-text" id="inputGroupPrepend2"><i class="fas fa-unlock"></i></span>
        <input type="password" class="form-control bg-light-x" id="validationDefault05" placeholder="Ingresa tu contraseña" id="exampleInputPassword1" name="password" required>
        </div>
        <a href="#" class="form-text text-muted text-decoration-none">Al menos 8 caracteres sin espacios</a>
      </div>

      <div class="col-md-4">
        <label for="exampleIputPassword1" class="form-label font-weight-bold cuenta">Confirma contraseña</label>
        <input type="password" class="form-control bg-light-x" id="validationDefault06" placeholder="Ingresa tu contraseña"
          id="exampleInputPassword1" name="password2" required>
        <a href="#"class="form-text text-muted text-decoration-none">Vuelva a ingresar su contraseña</a>
      </div>

      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
          <label class="form-check-label" for="invalidCheck2">
            Aceptar  t&eacuterminos y condiciones
          </label>
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit" name="send">Registrarme</button>
      </div>
    </form>

    <div class="text-center px-ñg-5 pt-lg-3 pb-lg-4 p-4 w-100 mt-auto">
      <p class="d-inline-block mb-0" ">¿Ya tiene cuenta?</p>
      <a href="vistalogin.php" class="cuenta1 text-decoration-none" style="font-weight: bold;">Inicie sesion</a>
    </div>
  </div>




  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="JS/formulario.js"></script>
  <script src="https://kit.fontawesome.com/d02273941b.js" crossorigin="anonymous"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>