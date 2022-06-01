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
    <h4>Tabla citas</h4>
    <a href="<?php echo base_url('crearcita'); ?>"><button class="btn btn-primary">Agregar Cita</button></a>
</div>
<table class="table table-hover" id="tablaClientes" name="tablaClientes">
    <thead>
        <tr>
            <th scope="col">Id cita</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Id cliente</th>
        </tr>
    </thead>
    <tbody id="resultClientes" name="resultClientes">
        <?php
        foreach ($cita->getResult() as $row) {
        ?>
            <tr>
                <td> <?php echo $row->id_cita ?></td>
                <td> <?php echo $row->fecha ?></td>
                <td> <?php echo $row->hora ?></td>
                <td> <?php echo $row->idcliente ?></td>
                <td>
                    <a href="<?php echo base_url('borrarcita/' . $row->id_cita); ?>"><button class="btn btn-danger">borrar cita</button></a>
                    <a href="<?php echo base_url('editarcita/' . $row->id_cita); ?>"><button class="btn btn-warning">editar cita</button></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<?php echo $this->endSection(); ?>