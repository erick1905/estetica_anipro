<?php echo $this->extend('pages/plantilla'); ?>
<?php echo $this->section('contenido'); ?>


<!-- DIV para contenido de la app [tablas, forms, etc.] -->
<div class="twoHeader">
    <h4>Tabla Servicios</h4>
    <a href="<?php echo base_url('crearpromocion'); ?>"><button class="btn btn-primary">Agregar promocion</button></a>
</div>
<table class="table table-hover" id="tablaClientes" name="tablaClientes">
    <thead>
        <tr>
            <th scope="col">id_promocion</th>
            <th scope="col">id_servicio</th>
            <th scope="col">fecha_inicio</th>
            <th scope="col">fecha_fin</th>
            <th scope="col">porcentaje</th>
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
                    <a href="<?php echo base_url('borrarpromo/' . $row->id_promocion); ?>"><button class="btn btn-danger">borrar promocion</button></a>
                    <a href="<?php echo base_url('editarpromo/' . $row->id_promocion); ?>"><button class="btn btn-warning">editar promocion</button></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<?php echo $this->endSection(); ?>