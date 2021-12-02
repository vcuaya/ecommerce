<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/catalogo.css">

  <title>E-commerce</title>
</head>

<body>
  <?php require 'partials/header.php' ?>

  <hr class="navegacion">

  <div class="clear"></div>

  <!--   Tarjetas-->
  <div class="title-cards">
      <h2>Tecnología</h2>
      <hr>
  </div>

  <div class="container">
  <div class="categorias">
    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
      <option value="1">Ropa</option>
      <option value="2">Tecnologia</option>
      <option value="3">Cocina</option>
    </select>
  </div>
  </div>


  <div class="container-card">

    <div class="justify-content-center">

      <div class="card d-inline-block">
        <figure>
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRZ9DMNFHxwZcfPXJrJeBMITxPMP3FMZk_ixXzTfzt4G_C-G058">
        </figure>
        <div class="contenido-card">
          <a href="#" class="link-producto"><h3>Tableta Grafica WACOM</h3></a>
          <p>Tableta grafica para que puedas hacer todos tus dibujos que quieras pero recuerda, no viene con talento.</p>
          <a href="#" class="boton-carrito">Añadir a carrito</a>
        </div>
      </div>

      <div class="card d-inline-block">
        <figure>
          <img src="https://www.tiendacanon.com.mx/wcsstore/CMEXCatalogAssetStore/Precio-Regular_noviembre_G2160_xl.jpg">
        </figure>
        <div class="contenido-card">
          <a href="#" class="link-producto"><h3>Impresora CANON</h3></a>
          <p>Impresora multifuncional serie G, con ventajas de las impresoras multifuncionales de tinta continua para poder imprimir más a un costo mucho más bajo.</p>
          <a href="#" class="boton-carrito">Añadir a carrito</a>
        </div>
      </div>
      
      <div class="card d-inline-block">
        <figure>
          <img src="https://image.freepik.com/foto-gratis/desarrollo-programadores-desarrollo-tecnologias-diseno-codificacion-sitios-web_18497-1090.jpg">
        </figure>
        <div class="contenido-card">
          <a href="#" class="link-producto"><h3>Laptop ASUS</h3></a>
          <p>Laptop gamer que no es gamer pero parece gamer pero no importa por que a ti te gusta que tenga lucesitas y nada mas por eso la vas a comprar.</p>
          <a href="#" class="boton-carrito">Añadir a carrito</a>
        </div>
      </div>

      <div class="card d-inline-block">
        <figure>
          <img src="https://image.freepik.com/foto-gratis/desarrollo-programadores-desarrollo-tecnologias-diseno-codificacion-sitios-web_18497-1090.jpg">
        </figure>
        <div class="contenido-card">
          <a href="#" class="link-producto"><h3>Laptop ASUS</h3></a>
          <p>Laptop gamer que no es gamer pero parece gamer pero no importa por que a ti te gusta que tenga lucesitas y nada mas por eso la vas a comprar.</p>
          <a href="#" class="boton-carrito">Añadir a carrito</a>
        </div>
      </div>  

      <div class="card d-inline-block">
        <figure>
          <img src="https://www.tiendacanon.com.mx/wcsstore/CMEXCatalogAssetStore/Precio-Regular_noviembre_G2160_xl.jpg">
        </figure>
        <div class="contenido-card">
          <a href="#" class="link-producto"><h3>Impresora CANON</h3></a>
          <p>Impresora multifuncional serie G, con ventajas de las impresoras multifuncionales de tinta continua para poder imprimir más a un costo mucho más bajo.</p>
          <a href="#" class="boton-carrito">Añadir a carrito</a>
        </div>
      </div>
      
      <div class="card d-inline-block">
        <figure>
          <img src="https://image.freepik.com/foto-gratis/desarrollo-programadores-desarrollo-tecnologias-diseno-codificacion-sitios-web_18497-1090.jpg">
        </figure>
        <div class="contenido-card">
          <a href="#" class="link-producto"><h3>Laptop ASUS</h3></a>
          <p>Laptop gamer que no es gamer pero parece gamer pero no importa por que a ti te gusta que tenga lucesitas y nada mas por eso la vas a comprar.</p>
          <a href="#" class="boton-carrito">Añadir a carrito</a>
        </div>
      </div>

    </div>

    

  </div>
  
  
  <div class="clear"></div>

  <?php require 'partials/footer.php' ?>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/d02273941b.js" crossorigin="anonymous"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>