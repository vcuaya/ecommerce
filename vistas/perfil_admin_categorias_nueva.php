<?php
require '../conexion/database.php';

$message = '';


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
<?php require '../partials/headeradmin.php' ?>
<?php
if ($admin == null) {
    header("Location: vistalogin.php");
}
?>

<div class="container row">
    <?php require '../partials/navegacionadmin.php' ?>

    <div class="col-lg-9">

        <div class="container shadow p-3 mb-5 bg-body rounded">
            <div class="fondo1 p-3 text-white rounded ">
                <h2 class="fw-bold">Categorias</h2>
            </div>
            <hr>
            <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1 row">
                <?php if (!empty($message)) : ?>
                    <p> <?= $message ?></p>
                <?php else : ?>
                    <div class="container">

                        <form action="perfil_admin_categorias_nueva.php" method="post" enctype="multipart/form-data">

                            Nombre: <input type="text" name="nombrecat" placeholder="Nombre de la categoria" required><br>
                            Descripcion: <input type="text" name="descripcion" placeholder="Descripcion" required><br>
                            <div class="input-group mb-3">
                                <labe>Elija la imagen de presentacion</labe>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                            </div>


                            <input type="submit" name="send" value="Agregar">
                        </form>
                    <?php endif; ?>

                    </div>
            </div>


        </div>
    </div>
</div>


<?php require '../partials/footeradmin.php' ?>