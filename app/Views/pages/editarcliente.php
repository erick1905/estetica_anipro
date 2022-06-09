<?php echo $this->extend('pages/plantilla'); ?>
<?= $this->section('contenido') ?>

<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Editar cliente</h3>

        <div class="col-auto">
            <button form="formularioEmpleado" class="btn btn-primary btn-sm" title="Registrar empleado">
                Actualizar
            </button>
        </div>
    </div>
    <form action="<?php echo base_url('actualizarcliente/' . $cliente->idcliente); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <style>
            body {
                background-image: url('img/rosa.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
            }
        </style>
        <div class="col-md-6">
            <label for="emp_nombre" class="form-label">Nombre</label>
            <input required type="text" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" title="el nombre solo debe contener minusculas de la a-z" size="5" class="form-control" value="<?= $cliente->cl_nombre ?>" name="cl_nombre" id="cl_nombre">
        </div>
        <div class="col-md-6">
            <label for="usuario" class="form-label">Telefono</label>
            <input type="tel" pattern="[0-9]{10}" title="el telefono solo debe contener 10 numeros del 1 al 10" class="form-control" value="<?= $cliente->cl_telefono ?>" name="cl_telefono" id=" cl_telefono">
        </div>
        <div class="col-md-6">
            </select>
        </div>

</div>
</div>

</form>
<table class="table table-bordered table-striped table-responsive table-hover">
</table>
</div>
</div>
<?php echo $this->endSection(); ?>