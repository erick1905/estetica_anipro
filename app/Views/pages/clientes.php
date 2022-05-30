<?php echo $this->extend('pages/plantilla'); ?>
<?php echo $this->section('contenido'); ?>


<!-- DIV para contenido de la app [tablas, forms, etc.] -->
<div class="twoHeader">
    <h4>Tabla clientes</h4>
    <a href="<?php echo base_url('crearcliente/'); ?>"><button class="btn btn-primary">Agregar Cliente</button></a>
</div>
<table class="table table-hover" id="tablaClientes" name="tablaClientes">
    <thead>
        <tr>
            <th scope="col">ID CLIENTE</th>
            <th scope="col">cl_nombre</th>
            <th scope="col">cl_telefono</th>
        </tr>
    </thead>
    <tbody id="resultClientes" name="resultClientes">
        <?php
        foreach ($clientes->getResult() as $row) {
        ?>
            <tr>
                <td> <?php echo $row->idcliente ?></td>
                <td> <?php echo $row->cl_nombre ?></td>
                <td> <?php echo $row->cl_telefono ?></td>
                <td>
                    <a href="<?php echo base_url('borrarcliente/' . $row->idcliente); ?>"><button class="btn btn-danger">borrar cliente</button></a>
                    <a href="<?php echo base_url('editarcliente/' . $row->idcliente); ?>"><button class="btn btn-warning">editar cliente</button></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<?php echo $this->endSection(); ?>
© 2022 GitHub, Inc.
Terms
Privacy