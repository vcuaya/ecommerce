<?php require 'partials/header.php' ?>
<?php
if ($user == null) {
    header("Location: vistas/vistalogin.php");
}
if (isset($_GET['iddireccion'])) {
    $idd = $_GET['iddireccion'];
    $recordsd = $conn->prepare('SELECT * FROM direccion WHERE iddireccion = :idd');
    $recordsd->bindParam(':idd', $idd);
    $recordsd->execute();
    $resultsd = $recordsd->fetch(PDO::FETCH_ASSOC);


    if (count($resultsd) > 0) {
        $direccion = $resultsd;
    }
}
if (!empty($_POST['estado']) && !empty($_POST['municipio'])  && !empty($_POST['colonia']) && !empty($_POST['calle']) && !empty($_POST['numexterior']) && !empty($_POST['cp'])) {
    
    $mysql = "UPDATE direccion SET estado=:estado, municipio=:municipio, colonia=:colonia, calle=:calle, numexterior=:numexterior, numinterior=:numinterior, lote=:lote, manzana=:manzana, edificio=:edificio, numpiso=:numpiso, cp=:cp WHERE direccion.iddireccion = :idd";

    $agregard = $conn->prepare($mysql);

    $num=$direccion['iddireccion'];
    $agregard->bindParam(':idd', $num);

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
        $message = 'Direccion actualizada';
    } else {
        $message = 'Error al actualizar direccion';
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
                    <form class="row g-3" action="perfil_direcciones_editar.php?iddireccion=<?php echo $direccion['iddireccion']; ?>" method="POST">
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault01" class="form-label fw-bold">Calle:* </label>
                            <input type="text" class="form-control text-muted" id="validationDefault01" placeholder="Calle..." name="calle" required value=<?= $direccion['calle']; ?>>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Colonia:*</label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Colonia..." name="colonia" required value=<?= $direccion['colonia']; ?>>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Numero exterior:*</label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Numero exterior..." name="numexterior" required value=<?= $direccion['numexterior']; ?>>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Numero interior:</label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Numero interior..." name="numinterior" value=<?= $direccion['numinterior']; ?>>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault01" class="form-label fw-bold">Municipio:* </label>
                            <input type="text" class="form-control text-muted" id="validationDefault01" placeholder="Municipio..." name="municipio" required value=<?= $direccion['municipio']; ?>>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Estado:* </label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Estado..." name="estado" required value=<?= $direccion['estado']; ?>>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Codigo Postal:* </label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="C.P..." name="cp" value=<?= $direccion['cp']; ?>>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Lote: </label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Lote..." name="lote" value=<?= $direccion['lote']; ?>>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Manzana: </label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Manzana..." name="manzana" value=<?= $direccion['manzana']; ?>>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Edificio: </label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Edificio..." name="edificio" value=<?= $direccion['edificio']; ?>>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Numero de piso: </label>
                            <input type="text" class="form-control text-muted" id="validationDefault02" placeholder="Numero de piso..." name="numpiso" value=<?= $direccion['numpiso']; ?>>
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