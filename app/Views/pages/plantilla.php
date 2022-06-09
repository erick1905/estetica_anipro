<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Primero van los LINK A  CSS -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Despues van los SCRIPTS de JS -->
    <!-- JS puede ir en el head o antes de terminar la etiqueta de <body> -->
    <title>Estetica!</title>

    <style>
        body {
            min-height: auto;
            /*la longitud de la pagina se adapta al contenido de la misma*/
            padding-top: 4.5rem;
            /* da un margen al top   */
        }
    </style>
</head>

<body>
    <!-- Inicio Navbar -->
    <nav class="navbar navbar-light bg-light navbar-expand-lg fixed-top" aria-label="Eighth navbar example">
        <div class="container">
            <!-- BRAND -- nombre de la app  -->
            <a class="navbar-brand" href="<?php echo base_url('admin') ?>">Principal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">

                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo base_url('clientes') ?>">Cliente</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo base_url('citas') ?>">Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo base_url('promocion') ?>">Promocion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo base_url('servicios') ?>">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo base_url('ventas') ?>">Ventas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo base_url('empleados') ?>">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="<?php echo base_url('reportes') ?>">Reportes</a>
                    </li>
                    </li>

                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <p class="dropdown-item"></p>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('/auth/logout'); ?>">
                            <i aria-current="page" class="nav-link fa-solid fa-arrow-right-from-bracket" title="Cerrar sesión" onclick="close_session();"></i>
                        </a>
                    </li>

                </ul>
                <script>
                    function close_session() {
                        const req = new XMLHttpRequest();
                        req.onload = function() {
                            let json = JSON.parse(this.responseText);
                            switch (json['validation']) {
                                case true:
                                    Command: toastr["success"]("Serás redirigido al inicio", "Sesión cerrada");
                                    setTimeout(function() {
                                        window.location.assign(globalURL);
                                    }, 1000);
                                    break;
                                default:
                                    Command: toastr["error"]("Ha ocurrido un error del parte del servidor", "Error del servidor");
                                    document.querySelector("#form").style.display = 'contents';
                                    break;
                            }
                        }
                        req.open('POST', globalURL + 'CONTROLLER/FUNCTION');
                        req.send(JSON.stringify());
                    }
                </script>


            </div>
        </div>
    </nav>
    <!-- Fin Navbar -->
    <!-- Inicio Contenido -->

    <?php $this->renderSection('contenido'); ?>


    <!-- Fin Contenido -->

    <!-- Inicio footer -->

    <!-- Fin footer -->

    <!-- Scripts de JS  -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>