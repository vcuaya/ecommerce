<?php require 'partials/header.php' ?>
<?php
$direccion = null;

if (isset($_SESSION['user_id'])) {
    $records2 = $conn->prepare('SELECT *  FROM direccion WHERE idcliente = :id');
    $records2->bindParam(':id', $user['idcliente']);
    $records2->execute();
    $results2 = $records2->fetch(PDO::FETCH_ASSOC);

    if (is_array($results2)) {
        if (count($results2) > 0) {
            $direccion = $results2;
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
                <h2 class="fw-bold">Direcciones</h2>
            </div>
            <hr>




            <?php if (!empty($direccion)) : ?>

                <?php
                include("direcciones/funciones.php");
                ?>
                <?php
                $sql = "select * from direccion where idcliente =" . $user['idcliente'] . "";
                $result = db_query($sql);
                $contador = 1;
                while ($row = mysqli_fetch_object($result)) {
                ?>

                    <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1 row">
                        <div class="col-md-6">
                            <label class="form-label datos fw-bold">Dirección <?php echo $contador ?> : </label>
                            <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion ">
                                Estado: <u><?php echo $row->estado; ?></u><br>
                                Municipio: <u><?php echo $row->municipio; ?></u><br>
                                Colonia: <u><?php echo $row->colonia; ?></u><br>
                                Calle: <u><?php echo $row->calle; ?></u><br>
                                Numero exterior: <u><?php echo $row->numexterior; ?></u><br>
                                Numero interior: <u><?php echo $row->numinterior; ?></u><br>
                                Lote: <u><?php echo $row->lote; ?></u><br>
                                Manzana: <u><?php echo $row->manzana; ?></u><br>
                                Edificio: <u><?php echo $row->edificio; ?></u><br>
                                Numero de piso: <u><?php echo $row->numpiso; ?></u><br>
                                CP: <u><?php echo $row->cp; ?></u><br>
                            </div>
                            <div class="position-relative">
                                <a class="btn btn-danger" href="direcciones/borrar.php?iddireccion=<?php echo $row->iddireccion; ?>"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
                                <a href="perfil_direcciones_editar.php" class="btn btn-outline-primary bottom-0 end-0 boton1">Editar</a>
                            </div>
                        </div>

                    </div>


                <?php $contador += 1;
                } ?>

                <a href="perfil_direcciones_nueva.php">Agregar direccion nueva</a>

            <?php else : ?>
                <div style="border: gray 2px solid; margin: 30px;">
                    <b>No tiene direccion registrada</b>
                    <a href="perfil_direcciones_nueva.php">Agregar direccion</a>
                </div>
            <?php endif; ?>

        </div>


    </div>
</div>
</div>


<?php require 'partials/footer.php' ?>