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
    <h4>Servicios</h4>
    <a href="<?php echo base_url('crearservicio'); ?>"><button class="btn btn-primary">Agregar</button></a>
</div>
<table class="table table-hover" id="tablaClientes" name="tablaClientes">
    <thead>
        <tr>
            <th scope="col">ID servicio</th>
            <th scope="col">Servicio</th>
            <th scope="col">Costo Venta</th>
            <th scope="col">Precio unitario</th>
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
                    <a href="<?php echo base_url('borrarservicio/' . $row->id_servicio); ?>"><button class="btn btn-danger">Borrar</button></a>
                    <a href="<?php echo base_url('editarservicio/' . $row->id_servicio); ?>"><button class="btn btn-warning">Editar</button></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<?php echo $this->endSection(); ?>