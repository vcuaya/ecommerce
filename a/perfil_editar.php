<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css/perfil.css">

  <title>E-commerce</title>
</head>

<body>
  <nav class="row navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid ">
      <a class="navbar-brand col-md-4 col-lg-5  logo-link" href="#">
        <img src="logos/logo_narvar.png" alt="logo" width="52" height="28" class="d-inline-block align-text-top ">
        E-commerce
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="container-fluid collapse navbar-collapse col-md-4 col-lg-4 col-12 mt-1 mb-1 justify-content-end"
        id="navbarNavDropdown">
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
          <button class="btn btn-outline-primary" type="submit">Buscar</button>
        </form>
      </div>


      <div class="collapse navbar-collapse col-lg-4 justify-content-end barra" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item menu_colapsable">
            <a class="nav-link active " aria-current="page" href="index.html">Inicio</a>
          </li>
          <li class="nav-item menu_colapsable">
            <a class="nav-link" href="carrito.html">Carrito</a>
          </li>
          <li class="nav-item menu_colapsable">
            <a class="nav-link" href="acerca_de.html">Acerca de</a>
          </li>
          <div class="vr"></div>
          <li class="nav-item dropdown menu_colapsable">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Ajustes <i class="fas fa-user-circle"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="inicio_sesion.html">Iniciar Sesión</a></li>
              <li><a class="dropdown-item" href="#">Salir</a></li>
              <li><a class="dropdown-item" href="perfil.html">Cuenta</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <hr class="navegacion">
  <br>


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
          <li class="list-group-item"><a href="perfil.html" class="text-decoration-none link_perfil ">Cuenta</a></li>
          <li class="list-group-item"><a href="perfil_direcciones.html"
              class="text-decoration-none link_perfil">Direcciones</a>
          </li>
          <li class="list-group-item"><a href="perfil_tarjeta.html"
              class="text-decoration-none link_perfil">Tarjetas</a></li>
          <li class="list-group-item"><a class="text-decoration-none link_perfil">Salir</a></li>
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
          <form class="row g-3">
            <div class="col-md-6 mb-4">
                <label for="validationDefault01" class="form-label fw-bold">Nombre: </label>
                <input type="text" class="form-control text-muted" id="validationDefault01" value="Benito Alejandro" aria-label="Disabled input example" disabled readonly >
            </div>
            <div class="col-md-6 mb-4">
                <label for="validationDefault02" class="form-label fw-bold">Apellidos:</label>
                <input type="text" class="form-control text-muted" id="validationDefault02" value="Garduño Perea" aria-label="Disabled input example" disabled readonly>
            </div>
            <div class="col-md-6 mb-4">
                <label for="validationDefault01" class="form-label fw-bold">RFC: </label>
                <input type="text" class="form-control text-muted" id="validationDefault01" value="MELM8305281H0" aria-label="Disabled input example" disabled readonly>
            </div>
            <div class="col-md-6 mb-4">
                <label for="validationDefault02" class="form-label fw-bold">Fecha de nacimiento:</label>
                <input type="date" class="form-control text-muted" id="validationDefault02" required>
            </div>
            <div class="col-md-6 mb-4">
                <label for="validationDefault01" class="form-label fw-bold">Usuario: </label>
                <input type="text" class="form-control text-muted" id="validationDefault01" placeholder="Usuario..." required>
            </div>
            <div class="col-md-6 mb-4">
                <label for="validationDefault02" class="form-label fw-bold">Correo Electrónico: </label>
                <input type="email" class="form-control text-muted" id="validationDefault02"  aria-describedby="emailHelp" placeholder="E-mail..." required>
            </div>
            <div class="col-md-6 mb-4">
                <label for="validationDefault02" class="form-label fw-bold">Tel. Móvil:  </label>
                <input type="number" class="form-control text-muted" id="validationDefault02" placeholder="Numero Móvil..." required>
            </div>
            <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                  <label class="form-check-label" for="invalidCheck2">
                    Aceptar t&eacuterminos y condiciones
                  </label>
                </div>
              </div>
            <div class="col-12">
                <button class="btn btn-outline-primary mb-2 me-2" type="submit">Guardar</button>
                <a href="perfil.php" class="btn btn-outline-danger position-absolute boton1">Cancelar</a>
            </div>
            
        </form>
        </div>

        


      </div>
    </div>


  </div>
  </div>
  </div>


  <div class="p-1 fondo-footer">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="index.html" class="nav-link px-2 text-white">Inicio</a></li>
        <li class="nav-item"><a href="carrito.html" class="nav-link px-2 text-white">Carrito</a></li>
        <li class="nav-item"><a href="catalogo.html" class="nav-link px-2 text-white">Catálogo</a></li>
        <li class="nav-item"><a href="acerca_de.html" class="nav-link px-2 text-white">Acerca de</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Cuenta</a></li>
      </ul>
      <p class="text-center text-muted">© 2021 E-commerce, Inc</p>
    </footer>
  </div>

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