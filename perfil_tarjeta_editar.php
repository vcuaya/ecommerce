<?php require 'partials/header.php' ?>
<?php
if ($user == null) {
 header("Location: vistas/vistalogin.php");
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

        <div class="col-lg-9 col-md-12 col-sm-12">

            <div class="shadow p-3 mb-5 bg-body rounded">

                <div class="fondo1 p-3 text-white rounded ">
                    <h2 class="fw-bold">información de la Tarjeta
                    </h2>
                </div>
                <hr>

                <div class="contenedor">

                    <!-- Tarjeta -->
                    <section class="tarjeta" id="tarjeta">
                        <div class="delantera">
                            <div class="logo-marca" id="logo-marca">
                                <!-- <img src="img/logos/visa.png" alt=""> -->
                            </div>
                            <img src="images/chip-tarjeta.png" class="chip" alt="">
                            <div class="datos">
                                <div class="grupo" id="numero">
                                    <p class="label">Número Tarjeta</p>
                                    <p class="numero">#### #### #### ####</p>
                                </div>
                                <div class="flexbox">
                                    <div class="grupo" id="nombre">
                                        <p class="label">Nombre Tarjeta</p>
                                        <p class="nombre">Jhon Doe</p>
                                    </div>

                                    <div class="grupo" id="expiracion">
                                        <p class="label">Expiracion</p>
                                        <p class="expiracion"><span class="mes">MM</span> / <span class="year">AA</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="trasera">
                            <div class="barra-magnetica"></div>
                            <div class="datos">
                                <div class="grupo" id="firma">
                                    <p class="label">Firma</p>
                                    <div class="firma">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="grupo" id="ccv">
                                    <p class="label">CCV</p>
                                    <p class="ccv"></p>
                                </div>
                            </div>
                            <p class="leyenda">Tu información de bancaria es totalmente confidencial y no será
                                compartida con terceros de ningun modo.</p>
                            <a href="#" class="link-banco">www.tubanco.com</a>
                        </div>
                    </section>

                    <!-- Contenedor Boton Abrir Formulario -->
                    <div class="contenedor-btn">
                        <button class="btn-abrir-formulario" id="btn-abrir-formulario">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>

                    <!-- Formulario -->
                    <form action="" id="formulario-tarjeta" class="formulario-tarjeta">
                        <div class="grupo">
                            <label for="inputNumero">Número Tarjeta</label>
                            <input type="text" id="inputNumero" maxlength="19" autocomplete="off">
                        </div>
                        <div class="grupo">
                            <label for="inputNombre">Nombre</label>
                            <input type="text" id="inputNombre" maxlength="19" autocomplete="off">
                        </div>
                        <div class="flexbox">
                            <div class="grupo expira">
                                <label for="selectMes">Expiracion</label>
                                <div class="flexbox">
                                    <div class="grupo-select">
                                        <select name="mes" id="selectMes">
                                            <option disabled selected>Mes</option>
                                        </select>
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                    <div class="grupo-select">
                                        <select name="year" id="selectYear">
                                            <option disabled selected>Año</option>
                                        </select>
                                        <i class="fas fa-angle-down"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="grupo ccv">
                                <label for="inputCCV">CCV</label>
                                <input type="text" id="inputCCV" maxlength="3">
                            </div>
                        </div>
                        <button type="submit" class="btn-enviar">Enviar</button>
                    </form>

                    <div class="container position-relative">
                        <a href="perfil_tarjeta.html"
                            class="btn btn-outline-danger position-absolute bottom-0 end-0 boton1">Cancelar</a>
                    </div>
                </div>

                

            </div>
        </div>
    </div>


            <!-- Optional JavaScript; choose one of the two! -->
            <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="js/perfil_tarjeta.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/d02273941b.js" crossorigin="anonymous"></script>
    <?php require 'partials/footer.php' ?>