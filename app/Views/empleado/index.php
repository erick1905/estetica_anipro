<!-- Inicio Contenido -->
<?php echo $this->extend('pages/plantilla'); ?>
<?php echo $this->section('contenido'); ?>

<style>
    body {
        background-image: url('img/rosa.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }
</style>
<!-- DIV para contenido de la app [tablas, forms, etc.] -->
<div class="container  px-4  gy-5">
    <h4>EMPLEADOS</h4>
    <a href="<?php echo base_url('empleados/crear'); ?>" class="btn btn-primary btn-sm" title="Nuevo empleado">
        <i class="bi bi-plus-circle"></i>
        Agregar
    </a>
    <table class="table table-hover" id="tablacliente" name="tablacliente">
        <thead>
            <tr>
                <th scope="col">id_empleado</th>
                <th scope="col">Nombre</th>
                <th scope="col">Usuario</th>
                <th scope="col">Fecha ingreso</th>
                <th scope="col">Fecha egreso</th>
            </tr>
        </thead>
        <tbody id="resultEmpleados" name="resultEmpleados">
            <?php foreach ($empleados->getResult() as $row) { ?>
                <tr>
                    <td><?php echo $row->id_empleado; ?></td>
                    <td><?php echo $row->emp_nombre; ?></td>
                    <td><?php echo $row->usuario; ?></td>
                    <td><?php echo $row->fecha_ingreso; ?></td>
                    <td><?php echo $row->fecha_egreso; ?></td>
                    <td>
                        <a href="<?php echo base_url('empleados/editar/' . $row->id_empleado); ?>" class="btn btn-outline-primary btn-sm">Editar</a>
                        <a href="<?php echo base_url('borrarempleado/' . $row->id_empleado); ?>" class="btn btn-outline-danger btn-sm">Dar de baja</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
    <div class=" container text-center" style="display : none;" id="mensajesServer" name="mensajesServer">
    </div>
</div>

<!-- se puede agregar mas contenido para ocultar o mostrar con js -->
<div id="result">



</div>
<!-- Fin Contenido -->

<script>
    function btnCall($id) {
        console.log("hola");
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            console.log(this.responseText);
            let json = JSON.parse(this.responseText);
            //console.log(Object.keys(json['datos']).length);
            // console.log(json['response']['result']);
        }

        xhttp.open("POST", base_URL + "api/ejemplo");
        xhttp.send();

    }
</script>
<script>
    window.onload = getEmpleados;

    function getEmpleados() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            //console.log(this.responseText);
            let json = JSON.parse(this.responseText);
            console.log(this.responseText);
            //console.log(Object.keys(json['datos']).length);
            console.log(json['response']['result']);
            switch (json['response']['result']) {
                case true:

                    for (var i = 0; i < Object.keys(json['datos']).length; i++) {
                        /* Con .innerHTML agregamos elemntos e inicia con tr = table row = fila*/
                        document.querySelector('#resultEmpleados').innerHTML += '<tr>' +
                            /* carga los datos a la tabla */
                            '<td>' + json['datos'][i]['nombre'] + '</td>' +
                            '<td>' + json['datos'][i]['usuario'] + '</td>' +
                            '<td>' + json['datos'][i]['fecha_ingreso'] + '</td>' +
                            '<td>' + json['datos'][i]['fecha_egreso'] + '</td>' +
                            '<td>' + json['datos'][i]['estado'] + '</td>' +
                            /* 
                             *esta td es para la columna de acciones
                             * Eliminar empleado
                             * Editar empleado
                             * Cambiar contraseña 
                             */
                            '<td><div class="d-grid gap-2 d-md-block">' +
                            '<button type="button" class="btn btn-primary">Editar</button>' +
                            '<button type="button" class="btn btn-danger">Eliminar</button>' +
                            '</div></td>' +

                            '</tr>'; /* final de table row */


                    }
                    break;
                case false:
                    document.querySelector("#tablaEmpleados").style.display = 'none';
                    document.querySelector("#mensajesServer").style.display = 'contents';
                    document.querySelector('#mensajesServer').innerHTML = '<h1>' + json['response']['message'] + '</h1>';
                    break;
                default:
                    document.querySelector("#tablaEmpleados").style.display = 'none';
                    document.querySelector("#mensajesServer").style.display = 'contents';
                    document.querySelector('#mensajesServer').innerHTML = '<h1>Ha ocurrido un problema con el servidor</h1>';
                    break;

            }

        }

        xhttp.open("POST", base_URL + "api/readEmpleados");
        xhttp.send();


    }
</script>
<?php echo $this->endSection(); ?>