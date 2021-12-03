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
                <h2 class="fw-bold">Perfil</h2>
            </div>
            <hr>
            <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1 row">
                <div class="col-md-6">
                    <label class="form-label datos fw-bold">Nombre : </label>
                    <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion"><?= $admin['nombre']; ?> <?= $admin['segundonombre']; ?></div>
                </div>
                <div class="col-md-6">
                    <label class="form-label datos fw-bold">Apellidos : </label>
                    <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion"><?= $admin['paterno']; ?> <?= $admin['materno']; ?></div>
                </div>

                <div class="col-md-6">
                    <label class="form-label datos fw-bold">RFC : </label>
                    <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion"><?= $admin['rfc']; ?></div>
                </div>
                <div class="col-md-6">
                    <label class="form-label datos fw-bold">Fecha de Nacimiento : </label>
                    <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion"><?= $admin['fechanac']; ?></div>
                </div>

                <div class="col-md-6">
                    <label class="form-label datos fw-bold">Usuario : </label>
                    <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion"><?= $admin['user']; ?></div>
                </div>
                <div class="col-md-6">
                    <label class="form-label datos fw-bold">Correo Electronico : </label>
                    <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion"><?= $admin['correo']; ?></div>
                </div>

                <div class="col-md-6">
                    <label class="form-label datos fw-bold">Tel Movil : </label>
                    <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion"><?= $admin['tel']; ?></div>
                </div>
                <br>
                <div class="position-relative">
                    <p style="opacity: .5;">Usted no puede editar sus credenciales, si asi lo desea solicitelo con el supervisor</p>
                </div>

            </div>
        </div>


    </div>
</div>
</div>


<?php require '../partials/footeradmin.php' ?>