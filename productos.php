<?php require 'partials/header.php' ?>
<?php
if (isset($_GET['idcategoria'])) {
    $idc = $_GET['idcategoria'];
    $recordsd = $conn->prepare('SELECT a.idproducto, a.name, a.imagen, a.precioventa, b.nombrecat FROM producto a INNER JOIN categoria b on a.idcategoria = b.idcategoria AND b.idcategoria = :idc');
    $recordsd->bindParam(':idc', $idc);
    $recordsd->execute();
    $resultsd = $recordsd->fetch(PDO::FETCH_ASSOC);



    if (count($resultsd) > 0) {
        $producto = $resultsd;
    }
}
?>


<h2 class="text-center"><?php echo $producto['nombrecat'] ?></h2>
<hr>
<div class="container">
    <?php
    include("direcciones/funciones.php");
    ?>
    <?php
    $sql = "SELECT a.idproducto, a.name, a.imagen, a.precioventa, b.nombrecat FROM producto a INNER JOIN categoria b on a.idcategoria = b.idcategoria AND b.idcategoria =" . $idc . "";
    $result = db_query($sql);
    while ($row = mysqli_fetch_object($result)) {
    ?>
        <div class=" row text-center">
            <div class="col-md-4 pb-1 pb-md-0">
                <div class="card">
                    <img class="card-img-top" src="<?php echo $row->imagen ?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row->name ?></h5>
                        <p class="card-text"><?php echo $row->precioventa  ?></p>
                        <a href="#" class="btn btn-primary">Agregar al carrito</a>
                    </div>
                </div>
            </div><br>
        </div><br>

    <?php
    } ?>
</div>

<div class="card" style="width: 18rem;">
  <img src="images/imgpro/laptop_msi.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>


    <?php require 'partials/footer.php' ?>