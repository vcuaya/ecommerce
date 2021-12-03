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
                <?php
                include("../direcciones/funciones.php");
                ?>
                <?php
                $sql = "select * from categoria";
                $result = db_query($sql);
                $contador = 1;
                while ($row = mysqli_fetch_object($result)) {
                ?>
                    <div class="text-center  mb-4">
                        <div>
                            <div class="card" style="    background-size: cover; background-position: center ; background-image: url('../<?php echo $row->imagen ?>')">
                                <div class="card-body" style="background-color: rgba(0,0,0,0.5);">
                                    <br>
                                    <h5 class="card-title" style="font-weight: bold; color: white;"><?php echo $row->nombrecat; ?></h5>
                                    <p class="card-text" style=" color: white;"><?php echo $row->descripcion; ?></p>
                                    <a href="../direcciones/borrarCategoria.php?idcategoria=<?php echo $row->idcategoria ?>" class="btn btn-danger">Borrar</a>
                                    <br>
                                </div>
                            </div>


                        </div>
                    </div>
                <?php $contador += 1;
                }
                $result->close();
                ?>

            </div>
            <div><a href="perfil_admin_categorias_nueva.php">Agregar nueva categoria</a></div>
        </div>


    </div>
</div>
</div>


<?php require '../partials/footeradmin.php' ?>