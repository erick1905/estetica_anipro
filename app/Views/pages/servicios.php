<?php echo $this->extend('pages/plantilla'); ?>
<?php echo $this->section('contenido'); ?>


<!-- DIV para contenido de la app [tablas, forms, etc.] -->
<div class="twoHeader">
    <h4>Tabla Servicios</h4>
    <a href="<?php echo base_url('crearservicio'); ?>"><button class="btn btn-primary">Agregar Servicio</button></a>
</div>
<table class="table table-hover" id="tablaClientes" name="tablaClientes">
    <thead>
        <tr>
            <th scope="col">id_servicio</th>
            <th scope="col">nombre_del_servicio</th>
            <th scope="col">costo_Venta</th>
            <th scope="col">precio_unitario</th>
        </tr>
    </thead>
    <tbody id="resultClientes" name="resultClientes">
        <?php
        foreach ($servicios->getResult() as $row) {
        ?>
            <tr>
                <td> <?php echo $row->id_servicio  ?></td>
                <td> <?php echo $row->nombre_del_servicio ?></td>
                <td> <?php echo $row->costo_Venta ?></td>
                <td> <?php echo $row->precio_unitario ?></td>
                <td>
                    <a href="<?php echo base_url('borrarservicio/' . $row->id_servicio); ?>"><button class="btn btn-danger">borrar servicio</button></a>
                    <a href="<?php echo base_url('editarservicio/' . $row->id_servicio); ?>"><button class="btn btn-warning">editar servicio</button></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<?php echo $this->endSection(); ?>