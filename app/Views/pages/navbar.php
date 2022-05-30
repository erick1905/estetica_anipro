<body>
    <!-- Inicio Navbar -->
    <nav class="navbar navbar-light bg-light navbar-expand-lg fixed-top" aria-label="Eighth navbar example">
        <div class="container">
            <!-- BRAND -- nombre de la app  -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                </ul>
                </li>

                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <p class="dropdown-item">USUARIO NAME</p>

                    </li>
                    <li class="nav-item">
                        <!-- Muestra un icono de Fontawesome con la etiqueta <i></i> -->
                        <a href="<?php echo base_url('/auth/logout'); ?>">
                            <p>cerrar Sesion</p>
                            <!-- <i aria-current="page" class="nav-link fa-solid fa-arrow-right-from-bracket" title="Cerrar sesión" onclick="close_session();"></i>-->
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">FASHION</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav">
                    <li class="nav-item active"> <a class="nav-link" href="#">Inicio</a> </li>
                    <li class="nav-item"><a class="nav-link" href="#"> Menu 1 </a></li>
                    <li class="nav-item dropdown" id="myDropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Menu 2</a>
                        <ul class="dropdown-menu">
                            <li> <a class="dropdown-item" href="#"> menu 1 </a></li>
                            <li> <a class="dropdown-item" href="#"> menu 2 &raquo; </a>
                                <ul class="submenu dropdown-menu">
                                    <li><a class="dropdown-item" href="#">promociones </a></li>
                                    <li><a class="dropdown-item" href="#">servicios</a></li>
                                    <li><a class="dropdown-item" href="#">citas &raquo; </a>
                                        <ul class="submenu dropdown-menu">
                                            <li><a class="dropdown-item" href="#">promociones</a></li>
                                            <li><a class="dropdown-item" href="#">servicios</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="dropdown-item" href="#">citas</a></li>

                                </ul>
                            </li>
                            <li><a class="dropdown-item" href="#"> Promociones </a></li>
                            <li><a class="dropdown-item" href="#"> Servicios </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- navbar-collapse.// -->
        </div>
        <!-- container-fluid.// -->
    </nav>