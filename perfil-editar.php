<?php require 'partials/header.php' ?>
<?php
if ($user == null) {
    header("Location: vistas/vistalogin.php");
}
?>
<?php
if (!empty($_POST['correo']) || !empty($_POST['user'])  || !empty($_POST['tel']) || !empty($_POST['rfc']) || !empty($_POST['fechanac'])) {

    $sql = "UPDATE cliente SET correo= :correo, user= :user, tel=:tel, rfc=:rfc, fechanac=:fechanac WHERE idcliente = :id";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id', $user["idcliente"]);
    $correosinespacio = preg_replace('/\s+/', '', $_POST['correo']);
    $stmt->bindParam(':correo', $correosinespacio);
    $stmt->bindParam(':user', $_POST['user']);
    $stmt->bindParam(':tel', $_POST['tel']);
    $stmt->bindParam(':rfc', $_POST['rfc']);
    $stmt->bindParam(':fechanac', $_POST['fechanac']);

    if ($stmt->execute()) {
        $message = 'Cambios guardados';
    } else {
        $message = 'Error al guardar cambios';
    }
}

?>


<br>


<div class="container row">
    <div class="col-lg-3">
        <div class="container shadow p-3 mb-5 bg-body rounded ">
            <img src="images/perfil.png" class="rounded mx-auto d-block imagen_perfil" alt="imagen perfil"> <br>
            <div class="fondo1 p-2 text-white rounded ">
                <h6 class="">Bienvenido de Vuelta</h6>
            </div>
            <br>
            <hr class="separador">

            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="perfil.php" class="text-decoration-none link_perfil ">Cuenta</a></li>
                <li class="list-group-item"><a href="perfil_direccion.html" class="text-decoration-none link_perfil">Direcciones</a>
                </li>
                <li class="list-group-item"><a href="perfil_tarjeta.html" class="text-decoration-none link_perfil">Tarjetas</a></li>
                <li class="list-group-item"><a class="text-decoration-none link_perfil">Salir</a></li>
            </ul>
        </div>

    </div>

    <div class="col-lg-9">
        <?php if (!empty($message)) : ?>
            <div style="color: white; font-weight: bold; text-align: center; padding: 30%; background-color: #00bb2d; border-radius:5px; font-size: 150%">
                <p> <?= $message ?></p>
            </div>

        <?php else : ?>
            <form action="perfil-editar.php" method="post">
                <div class="container shadow p-3 mb-5 bg-body rounded">
                    <div class="fondo1 p-3 text-white rounded ">
                        <h2 class="fw-bold">Perfil</h2>
                    </div>
                    <hr>
                    <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1 row">
                        <div class="col-md-6">
                            <label class="form-label datos fw-bold">Nombre : </label>
                            <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion"><?= $user['nombre']; ?> <?= $user['segundonombre']; ?></div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label datos fw-bold">Apellidos : </label>
                            <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion"><?= $user['paterno']; ?> <?= $user['materno']; ?></div>
                        </div>

                        <div class="col-md-6 mb-5">
                            <label class="form-label datos fw-bold">RFC : </label>
                            <input type="text" class="form-control" id="rfc" placeholder="RFC..." name="rfc" value=<?= $user['rfc']; ?>>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label datos fw-bold">Fecha de Nacimiento : </label>
                            <input type="date" class="form-control" id="fechanac" placeholder="Fecha de nacimiento..." name="fechanac" value=<?= $user['fechanac']; ?>>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label datos fw-bold">Usuario : </label>
                            <input type="text" class="form-control" id="user" placeholder="Nombre..." name="user" value=<?= $user['user']; ?>>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label datos fw-bold">Correo Electronico : </label>
                            <input type="email" class="form-control" id="correo" placeholder="E-mail..." name="correo" value=<?= $user['correo']; ?>>
                        </div>

                        <div class="col-md-6 mb-4 mt-5">
                            <label class="form-label datos fw-bold">Tel Movil : </label>
                            <input type="text" class="form-control" id="tel" placeholder="Telefono..." name="tel" value=<?= $user['tel']; ?>>
                        </div>
                        <br>

                        <div class="container position-relative mt-3">
                            <button class="btn btn-outline-success boton1" type="submit" name="send">guardar</button>
                            <a href="perfil.php" class="btn btn-outline-danger boton1">Cancelar</a>
                        </div>


                    </div>
                </div>
            </form>

        <?php endif; ?>
    </div>
</div>


<?php require 'partials/footer.php' ?>