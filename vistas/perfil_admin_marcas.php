<?php
require '../conexion/database.php';
$message = '';

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
                <h2 class="fw-bold">Marcas</h2>
            </div>
            <hr>
            <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1 row">
                <?php if (!empty($message)) : ?>
                    <p> <?= $message ?></p>
                <?php else : ?>
                    <div>

                        <form action="perfil_admin_marcas.php" method="post">

                            Nombre: <input type="text" name="nombremarc" placeholder="Nombre de la marca" required><br>
                            <input class="btn btn-primary" type="submit" name="send" value="Agregar">
                        </form>
                    <?php endif; ?>

                    </div>
            </div>


        </div>
    </div>
</div>