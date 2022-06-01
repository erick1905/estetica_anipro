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
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Nuevo Cliente</h3>
        <div class="col-auto">
            <button form="formularioEmpleado" class="btn btn-primary btn-sm" title="Registrar empleado">
                Registrar cliente
            </button>
        </div>
    </div>
    <form action="<?php echo base_url('registrarcliente'); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <div class="col-md-6">
            <label for="emp_nombre" class="form-label">Cl_nombre</label>
            <input required type="text" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" title="el nombre solo debe contener minusculas de la a-z" size="5" class="form-control" name="cl_nombre" id="cl_nombre">
        </div>
        <div class="col-md-6">
            <label for="usuario" class="form-label">Cl_telefono</label>
            <input type="text" pattern="[0-9]{10}" title="el telefono solo debe contener 10 numeros del 1 al 10" class="form-control" name=" cl_telefono" id=" cl_telefono">
        </div>
</div>
</form>
</div>
</div>
<?= $this->endSection() ?>