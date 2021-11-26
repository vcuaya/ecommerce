<?php require 'partials/header.php' ?>
<?php
if ($user == null) {
 header("Location: vistas/vistalogin.php");
}
?>

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
                <li class="list-group-item"><a href="perfil_direcciones.php" class="text-decoration-none link_perfil">Direcciones</a>
                </li>
                <li class="list-group-item"><a href="perfil_tarjeta.php" class="text-decoration-none link_perfil">Tarjetas</a></li>
                <li class="list-group-item"><a class="text-decoration-none link_perfil" href="logout.php">Salir</a></li>
            </ul>
        </div>

    </div>

    <div class="col-lg-9">

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

                <div class="col-md-6">
                    <label class="form-label datos fw-bold">RFC : </label>
                    <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion"><?= $user['rfc']; ?></div>
                </div>
                <div class="col-md-6">
                    <label class="form-label datos fw-bold">Fecha de Nacimiento : </label>
                    <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion"><?= $user['fechanac']; ?></div>
                </div>

                <div class="col-md-6">
                    <label class="form-label datos fw-bold">Usuario : </label>
                    <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion"><?= $user['user']; ?></div>
                </div>
                <div class="col-md-6">
                    <label class="form-label datos fw-bold">Correo Electronico : </label>
                    <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion"><?= $user['correo']; ?></div>
                </div>

                <div class="col-md-6">
                    <label class="form-label datos fw-bold">Tel Movil : </label>
                    <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion"><?= $user['tel']; ?></div>
                </div>
                <br>
                <div class="position-relative">
                    <a href="perfil-editar.php" class="btn btn-outline-primary position-absolute bottom-0 end-0 boton1">Editar</a>
                </div>

            </div>
        </div>


    </div>
</div>
</div>


<?php require 'partials/footer.php' ?>