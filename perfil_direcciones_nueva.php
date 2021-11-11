<?php require 'partials/header.php' ?>
<?php
if ($user == null) {
    header("Location: vistas/vistalogin.php");
}

if (!empty($_POST['estado']) && !empty($_POST['municipio'])  && !empty($_POST['colonia']) && !empty($_POST['calle']) && !empty($_POST['numexterior']) && !empty($_POST['cp'])) {

    $mysql = "INSERT INTO direccion (idcliente,estado,municipio,colonia,calle,numexterior,numinterior,lote,manzana,edificio,numpiso,cp) VALUES (:id,:estado,:municipio,:colonia,:calle,:numexterior,:numinterior,:lote,:manzana,:edificio,:numpiso,:cp)";

    $agregard = $conn->prepare($mysql);


    $agregard->bindParam(':id', $_SESSION['user_id']);

    $agregard->bindParam(':estado', $_POST['estado']);
    $agregard->bindParam(':municipio', $_POST['municipio']);
    $agregard->bindParam(':colonia', $_POST['colonia']);
    $agregard->bindParam(':calle', $_POST['calle']);
    $agregard->bindParam(':numexterior', $_POST['numexterior']);
    $agregard->bindParam(':numinterior', $_POST['numinterior']);
    $agregard->bindParam(':lote', $_POST['lote']);
    $agregard->bindParam(':manzana', $_POST['manzana']);
    $agregard->bindParam(':edificio', $_POST['edificio']);
    $agregard->bindParam(':numpiso', $_POST['numpiso']);
    $agregard->bindParam(':cp', $_POST['cp']);


    if ($agregard->execute()) {
        $message = 'Direccion agregada';
    } else {
        $message = 'Error al guardar direccion';
    }
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
                <h2 class="fw-bold">Dirección</h2>
            </div>
            <hr>
            <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1 row">


                <?php if (!empty($message)) : ?>
                    <p> <?= $message ?></p>
                <?php else : ?>
                    <form class="row g-3" action="perfil_direcciones_nueva.php" method="POST">
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault01" class="form-label fw-bold">Calle:* </label>
                            <input type="text" class="form-control text-muted" id="validationDefault01" placeholder="Calle..." name="calle" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Colonia:*</label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Colonia..." name="colonia" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Numero exterior:*</label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Numero exterior..." name="numexterior" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Numero interior:</label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Numero interior..." name="numinterior">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault01" class="form-label fw-bold">Municipio:* </label>
                            <input type="text" class="form-control text-muted" id="validationDefault01" placeholder="Municipio..." name="municipio" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Estado:* </label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Estado..." name="estado" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Codigo Postal:* </label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="C.P..." name="cp">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Lote: </label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Lote..." name="lote">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Manzana: </label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Manzana..." name="manzana">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Edificio: </label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Edificio..." name="edificio">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Numero de piso: </label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Numero de piso..." name="numpiso">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-outline-primary" type="submit">Guardar</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>

        </div>

    </div>
</div>
</div>


<?php require 'partials/footer.php' ?>