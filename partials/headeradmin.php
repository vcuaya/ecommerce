<?php
session_start();

require_once '../conexion/database.php';
$admin = null;

if (isset($_SESSION['admin_id'])) {
    $records = $conn->prepare('SELECT * FROM administrador WHERE idadministrador = :id');
    $records->bindParam(':id', $_SESSION['admin_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);


    if (count($results) > 0) {
        $admin = $results;
    }
}
//if ($user == null) {
// header("Location: vistas/vistalogin.php");
//}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/perfil_Y_tarjeta.css">
    


    <title>E-commerce</title>
</head>

<body>
    <nav class="row navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid ">
            <a class="navbar-brand col-md-4 col-lg-5  logo-link" href="perfil_admin.php">
                <img src="../logos/logo_narvar.png" alt="logo" width="52" height="28" class="d-inline-block align-text-top "> E-commerce
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            


            <div class="collapse navbar-collapse col-lg-4 justify-content-end barra" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item menu_colapsable">
                        <a class="nav-link active " aria-current="page" href="perfil_admin.php">Inicio</a>
                    </li>
                    <div class="vr"></div>

                    <!-- Aqui se aplica la condicion de que si esta logeado muestre el nombre del usuario -->
                    <li class="nav-item dropdown menu_colapsable">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ajustes <i class="fas fa-user-circle"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">


                            <?php if ($admin == NULL) : ?>
                                <li><a class="dropdown-item" href="vistas/vistalogin.php">Iniciar Sesión</a></li>
                            <?php else : ?>
                                <li>
                                    <div class="container fw-bold"> Hola <?= $admin['user']; ?></div>
                                </li>
                                <li><a class="dropdown-item" href="perfil_admin.php">Cuenta</a></li>
                                <li><a class="dropdown-item" href="../logout.php">Salir</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <hr class="navegacion">

    <div></div>