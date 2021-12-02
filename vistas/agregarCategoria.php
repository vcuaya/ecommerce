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

if (!empty($_POST['nombrecat']) && !empty($_POST['descripcion'])) {
    if ($_FILES["imagen"]) {
        $nombre_base = basename($_FILES["imagen"]["name"]);
        $nombre_final = date("m-d-y") . "-" . date("H-i-s") . "-" . $nombre_base;
        $ruta = "../images/imgcat/" . $nombre_final;
        $ruta2 = "images/imgcat/" . $nombre_final;
        $subirarchivo = move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
        if ($subirarchivo) {
            $mysql = "INSERT INTO categoria (nombrecat, imagen, descripcion) VALUES (:nombrecat, :imagen, :descripcion)";

            $agregard = $conn->prepare($mysql);

            $agregard->bindParam(':nombrecat', $_POST['nombrecat']);
            $agregard->bindParam(':imagen', $ruta2);
            $agregard->bindParam(':descripcion', $_POST['descripcion']);
            

            if ($agregard->execute()) {
                $message = 'Categoria agregada';
            } else {
                $message = 'Error al guardar categoria';
            }
        }
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


    <h1 style="display: inline-flex;">Categorias</h1>
    <a class="nav-link" href="../logout.php">Cerrar sesion</a>
    <br>
    <a href="agregarProducto.php"> Agregar producto</a><br>
    <a href="agregarMarca.php"> Agregar Marca</a>
    <?php if (!empty($message)) : ?>
        <p> <?= $message ?></p>
    <?php else : ?>
        <p style="text-align:center;">Agregando categoria por el administrador <b><?= $user['user']; ?></b><br><br></p>
        <div>

            <form action="agregarCategoria.php" method="post" enctype="multipart/form-data">

                Nombre: <input type="text" name="nombrecat" placeholder="Nombre de la categoria" required><br>
                Descripcion: <input type="text" name="descripcion" placeholder="Descripcion" required><br>
                <div class="container">
                    <div class="input-group mb-3">
                        <labe>Elija la imagen de presentacion</labe>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                    </div>
                </div>

                <input type="submit" name="send" value="Agregar">
            </form>
        <?php endif; ?>
        <br>
        </div>

        <a href="agregarcategoria.php"> Agregar mas... </a>


</body>

</html>