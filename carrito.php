<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/carrito.css">

  <title>E-commerce</title>
</head>

<body>
  <?php require 'partials/header.php' ?>
  <hr class="navegacion">

  <div class="clear2"></div>

  <div class="container shadow p-3 mb-5 bg-white rounded">
    <div class="fondo1 p-3 text-white rounded mb-3">
      <h2 class="fw-bold">Carrito</h2>
    </div>
    <div class="row mb-2">
      <div class="col-6">
        <div class="shopping-cart-header">
          <h6>Producto</h6>
        </div>
      </div>
      <div class="col-2">
        <div class="shopping-cart-header">
          <h6 class="text-truncate">Precio</h6>
        </div>
      </div>
      <div class="col-4">
        <div class="shopping-cart-header">
          <h6>Cantidad</h6>
        </div>
      </div>
    </div>

    <!--Inicia tarjeta de producto-->
    <div class="container shadow p-3 mb-3 bg-white rounded">
      <div class="row shoppingCartItem">
        <div class="col-6">
          <div class="shopping-cart-item d-flex align-items-center h-100 border-bottom pb-2 pt-3">
            <img
              src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058"
              class="shopping-cart-image mx-2">
            <h6 class="shopping-cart-item-title shoppingCartItemTitle text-truncate ml-3 mb-0 ">Nombre del producto</h6>
          </div>
        </div>
        <div class="col-2">
          <div class="shopping-cart-price d-flex align-items-center h-100 border-bottom pb-2 pt-3">
            <p class="item-price mb-0 shoppingCartItemPrice">6.99$</p>
          </div>
        </div>
        <div class="col-4">
          <div
            class="shopping-cart-quantity d-flex justify-content-between align-items-center h-100 border-bottom pb-2 pt-3">
            <input class="shopping-cart-quantity-input shoppingCartItemQuantity" type="number" value="1">
            <button class="btn btn-danger buttonDelete" type="button">X</button>
          </div>
        </div>
      </div>
    </div>
    <!--Final de tarjeta de producto-->

    <!--Inicia tarjeta de producto-->
    <div class="container shadow p-3 mb-3 bg-white rounded">
      <div class="row shoppingCartItem">
        <div class="col-6">
          <div class="shopping-cart-item d-flex align-items-center h-100 border-bottom pb-2 pt-3">
            <img
              src="https://www.tiendacanon.com.mx/wcsstore/CMEXCatalogAssetStore/Precio-Regular_noviembre_G2160_xl.jpg"
              class="shopping-cart-image mx-2">
            <h6 class="shopping-cart-item-title shoppingCartItemTitle text-truncate ml-3 mb-0 ">Nombre del producto</h6>
          </div>
        </div>
        <div class="col-2">
          <div class="shopping-cart-price d-flex align-items-center h-100 border-bottom pb-2 pt-3">
            <p class="item-price mb-0 shoppingCartItemPrice">6.99$</p>
          </div>
        </div>
        <div class="col-4">
          <div
            class="shopping-cart-quantity d-flex justify-content-between align-items-center h-100 border-bottom pb-2 pt-3">
            <input class="shopping-cart-quantity-input shoppingCartItemQuantity" type="number" value="1">
            <button class="btn btn-danger buttonDelete" type="button">X</button>
          </div>
        </div>
      </div>
    </div>
    <!--Final de tarjeta de producto-->


    <!--inicia la parte del total-->
    <div class="row">
        <div class="shopping-cart-total d-flex align-items-center">
          <div class="mb-0"> Total</div>
          <div class="mx-3 mb-0">123,243.00$</div>
          <button class="btn btn-success ml-auto comprarButton align-items-end" type="button" data-toggle="modal"
            data-target="#comprarModal">Comprar</button>
        </div>
    </div>
    <!--Final de total-->
  
    <!--Inicia ventana emergente cuando das en el boton de comprar-->
    <div class="modal fade" id="comprarModal" tabindex="-1" aria-labelledby="comprarModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="comprarModalLabel">Gracias por su compra</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Pronto recibirá su pedido</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <!--final de la ventana emergente-->
  </div>

  <div class="clear"></div>


  <?php require 'partials/footer.php' ?>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/d02273941b.js" crossorigin="anonymous"></script>

  <!-- SCRIPTS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"></script>
</body>

</html>