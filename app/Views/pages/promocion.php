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
<div class="twoHeader">
    <h4>Promocion</h4>
    <a href="<?php echo base_url('crearpromocion'); ?>"><button class="btn btn-primary">Agregar</button></a>
</div>
<table class="table table-hover" id="tablaClientes" name="tablaClientes">
    <thead>
        <tr>
            <th scope="col">ID Promocion</th>
            <th scope="col">ID Servicio</th>
            <th scope="col">Fecha de inicio</th>
            <th scope="col">Fecha final</th>
            <th scope="col">Porcentaje</th>
        </tr>
    </thead>
    <tbody id="resultClientes" name="resultClientes">
        <?php
        foreach ($Promocion->getResult() as $row) {
        ?>
            <tr>
                <td> <?php echo $row->id_promocion ?></td>
                <td> <?php echo $row->id_servicio ?></td>
                <td> <?php echo $row->fecha_inicio ?></td>
                <td> <?php echo $row->fecha_fin ?></td>
                <td> <?php echo $row->porcentaje ?>%</td>
                <td>
                    <a href="<?php echo base_url('borrarpromo/' . $row->id_promocion); ?>"><button class="btn btn-danger">Borrar</button></a>
                    <a href="<?php echo base_url('editarpromo/' . $row->id_promocion); ?>"><button class="btn btn-warning">Editar</button></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<?php echo $this->endSection(); ?>