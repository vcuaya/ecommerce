<?php
session_start();
require '../conexion/database.php';
$user = null;
$message = '';
if (isset($_SESSION['admin_id'])) {
    $records = $conn->prepare('SELECT * FROM administrador WHERE idadministrador = :id');
    $records->bindParam(':id', $_SESSION['admin_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    if (count($results) > 0) {
        $user = $results;
    }
}



if ($user == null) {
    header("Location: vistalogin.php");
}

if (!empty($_POST['nombremarc'])) {
    $mysql = "INSERT INTO marca (nombremarc) VALUES (:nombremarc)";

    $agregard = $conn->prepare($mysql);

    $agregard->bindParam(':nombremarc', $_POST['nombremarc']);

    if ($agregard->execute()) {
        $message = 'Marca agregada';
    } else {
        $message = 'Error al guardar marca';
    }
}

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Productos</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Liu+Jian+Mao+Cao&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/perfil_Y_tarjeta.css">
</head>

<body style="text-align: center;">


    <h1 style="display: inline-flex;">Marcas</h1>
    <a class="nav-link" href="../logout.php">Cerrar sesion</a>
    <br>
    <a href="agregarProducto.php"> Agregar producto</a><br>
    <a href="agregarCategoria.php"> Agregar Categoria</a>
    <?php if (!empty($message)) : ?>
        <p> <?= $message ?></p>
    <?php else : ?>
        <p style="text-align:center;">Agregando marca por el administrador <b><?= $user['user']; ?></b><br><br></p>
        <div>

            <form action="agregarMarca.php" method="post">

                Nombre: <input type="text" name="nombremarc" placeholder="Nombre de la marca" required><br>
                <input type="submit" name="send" value="Agregar">
            </form>
        <?php endif; ?>
        <br>
        </div>

        <a href="agregarMarca.php"> Agregar mas... </a>


</body>

</html>