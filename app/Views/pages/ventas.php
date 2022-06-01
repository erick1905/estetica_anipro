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
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <div class="container">
        <h1>Nueva venta</h1>
    </div>

    <div class="container">

        <!-- parte quecarga los articulos en el select
    este parte debe estar afuera del form  -->
        <div class="container">



            <div class="card">
                <div class="card-body">

                    <div class="input-group ">
                        <select class="form-select" id="articulo" aria-label="Example select with button addon">
                            <option selected>Seleccionar Servicio.</option>
                            <?php foreach ($articulos as $row) { ?>
                                <option value-ID="<?= $row->id_servicio  ?>" value-ARTICULO="<?= $row->nombre_del_servicio ?>
                                " value-PRECIO="<?= $row->costo_Venta ?>"><?= $row->nombre_del_servicio ?></option>
                            <?php  } ?>
                        </select>

                        <select class="form-select" id="promo" aria-label="Example select with button addon">
                            <option selected>Seleccionar descuento.</option>
                            <?php foreach ($promo as $row) { ?>
                                <option value-IDP="<?= $row->id_promocion  ?>" value-fechai="<?= $row->fecha_inicio ?>" value-fechaf="<?= $row->fecha_fin ?>" value-fechaf="<?= $row->id_servicio ?>" value-porcentaje="<?= $row->porcentaje  ?>"> <?= $row->porcentaje ?></option>
                            <?php  } ?>

                        </select>




                        <input type="text" placeholder="Cantidad" name="cantidad" id="cantidad" class="form-control" min=1>
                        <button class="btn btn-outline-primary" type="button" onclick="agregarArticulo();">Agregar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--aqui se van agregando sus lista de articulos al form  -->
        <div class="container">
            <form action="<?php echo base_url('/formulario'); ?>" method="POST">
                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-auto me-auto">
                                <h3>Mi lista de Servicios</h3>
                            </div>
                            <div class="col-auto">
                                <label class="form-label" for="total">Total $</label>
                                <input class="form-control" type="text" id="total" value="0" name="total" readonly>

                            </div>
                            <div class="col-auto">
                                <button class="btn btn-outline-primary" type="submit" href="<?php echo base_url('ventas') ?>">Vender</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush" id="misArticulos">

                        </ul>
                    </div>

                </div>
            </form>

        </div>
        <!-- este script agrega al form la lista de items seleccionados  -->

        <script>
            var sumatoria = 0;

            function agregarArticulo() {

                var cantidad = document.getElementById('cantidad').value;
                var i = document.getElementById('articulo');
                var b = document.getElementById('promo');
                var total = document.getElementById('total');
                var id_articulo = i.options[i.selectedIndex].getAttribute('value-ID');
                var articulo = i.options[i.selectedIndex].getAttribute('value-ARTICULO');
                var precio = i.options[i.selectedIndex].getAttribute('value-PRECIO');

                var porcentaje = b.options[b.selectedIndex].getAttribute('value-porcentaje');

                var importe = precio * cantidad;
                var descuento = porcentaje * importe / 100;
                sumatoria += importe - descuento;

                var numberList = document.getElementById("misArticulos");
                numberList.innerHTML += '<li class="list-group-item">' +
                    '<input type="text" name="id_articulo[]" value="' + id_articulo + '" hidden>' +
                    '<input type="text" name="articulo[]" value="' + articulo + '" readonly>' +
                    '<input type="text" name="precio[]" value="' + precio + '" readonly>' +
                    '<input type="text" name="cantidad[]" value="' + cantidad + '" readonly>' +
                    '<input type="text" name="importe[]" value="' + importe + '" readonly>' +
                    '<input type="text" name="porcentaje[]" value="' + porcentaje + '" readonly>' +
                    '</li>';
                console.log(sumatoria);
                total.value = sumatoria;
            }
        </script>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>
<?php echo $this->endSection(); ?>