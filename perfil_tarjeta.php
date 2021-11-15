<?php require 'partials/header.php' ?>
<?php
$tarjeta = null;

if (isset($_SESSION['user_id'])) {
    $records3 = $conn->prepare('SELECT *  FROM pago WHERE idcliente = :id');
    $records3->bindParam(':id', $user['idcliente']);
    $records3->execute();
    $results3 = $records3->fetch(PDO::FETCH_ASSOC);

    if (is_array($results3)) {
        if (count($results3) > 0) {
            $tarjeta = $results3;
        }
    }
}


if ($user == null) {
    header("Location: vistas/vistalogin.php");
}
?>

<div class="container row">
    <div class="col-lg-3 d-none d-lg-block">
        <div class="container shadow p-3 mb-5 bg-body rounded ">
            <img src="images/perfil.png" class="rounded mx-auto d-block imagen_perfil" alt="imagen perfil"> <br>
            <div class="fondo1 p-2 text-white rounded ">
                <h6 class="">Bienvenido de Vuelta</h6>
            </div>
            <br>
            <hr class="separador">

            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="perfil.php" class="text-decoration-none link_perfil ">Cuenta</a></li>
                <li class="list-group-item"><a href="perfil_direcciones.php" class="text-decoration-none link_perfil">Direcciones</a>
                </li>
                <li class="list-group-item"><a href="perfil_tarjeta.php" class="text-decoration-none link_perfil">Tarjetas</a></li>
                <li class="list-group-item"><a class="text-decoration-none link_perfil" href="logout.php">Salir</a></li>
            </ul>
        </div>

    </div>

    <div class="col-lg-9 col-sm-12">

        <div class="container shadow p-3 mb-5 bg-body rounded">
            <div class="fondo1 p-3 text-white rounded ">
                <h2 class="fw-bold">Tarjetas</h2>
            </div>
            <hr>

            <?php if (!empty($tarjeta)) : ?>

                <?php
                include("direcciones/funciones.php");
                ?>
                <?php
                $sql = "select * from pago where idcliente =" . $user['idcliente'] . "";
                $result = db_query($sql);
                $contador = 1;
                while ($row = mysqli_fetch_object($result)) {
                ?>

                    <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1">
                        <div class="col-md-6 col-lg-6 d-inline">
                            <label class="form-label datos fw-bold">Tarjeta <?php echo $contador ?> : </label>
                            <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion ">Nombre: <?php echo $row->nombre; ?><br>
                                No.Tarjeta: <?php echo $row->numerotarjeta; ?> <br> Vigencia: <?php echo $row->mesvencimiento; ?>/<?php echo $row->yearvencimiento; ?> <br>
                            </div>
                            <div class="position-relative">
                                <a class="btn btn-danger bottom-0 end-0 boton1 position-relative" href="direcciones/borrartarjeta.php?idpago=<?php echo $row->idpago; ?>"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
                                <a href="perfil_tarjeta_editar.php?idpago=<?php echo $row->idpago; ?>" class="btn btn-outline-primary position-relative bottom-0 end-0 boton1" style="width: 100px;">Actualizar</a>
                            </div>
                        </div>

                    </div>



                <?php $contador += 1;
                } ?>

                <div>
                    <b>Agregar nueva tarjeta</b>
                    <a href="perfil_tarjeta_nueva.php">Agregar tarjeta</a>
                </div>

            <?php else : ?>
                <div style="border: gray 2px solid; margin: 30px;">
                    <b>No tiene tarjetas registradas</b>
                    <a href="perfil_tarjeta_nueva.php">Agregar tarjeta</a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>


<?php require 'partials/footer.php' ?>