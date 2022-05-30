<!-- Inicio Contenido -->
<?php echo $this->extend('pages/plantilla'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Nuevo Empleado</h3>
        <div class="col-auto">
            <button form="formularioEmpleado" class="btn btn-primary btn-sm" title="Registrar empleado">
                Registrar
            </button>
        </div>
    </div>
    <form action="<?php echo base_url('empleados/registrar/'); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <div class="col-md-6">
            <label for="emp_nombre" class="form-label">Nombre</label>
            <input required type="text" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" title="el nombre solo debe contener minusculas de la a-z" size="5" class="form-control" name="emp_nombre" id="emp_nombre">

        </div>
        <div class="col-md-6">
            <label for="usuario" class="form-label">Usuario</label>
            <input required type="text" pattern="^([a-z]+[0-9]{0,2}){5,12}$" title="completa tendrá entre 5 y 12 caracteres." class="form-control" name=" usuario" id=" usuario">
        </div>
        <div class="col-md-6">
            <label for="contrasena" class="form-label">Contraseña</label>
            <input required type="password" pattern="[A-Za-z0-9!?-]{8,12}" title="podrá contener letras mayúsculas, minúsculas, números y los caracteres !?-. Su tamaño: entre 8 y 12 caracteres." class="form-control" name="contracena" id="contracena">

        </div>
        <div class="col-md-6">
            <label for="fecha_ingreso" class="form-label">Fecha de ingreso año/mes/dia</label>
            <input required type="date" class="form-control" name="fecha_ingreso" id="fecha_ingreso">
        </div>
        <div class="col-md-6">

        </div>
        <div class="col-md-12">
            <label class="form-check-label" for="estado">Estado</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="text" value='1' disabled name="estado" id="estado">
                <label class="form-check-label" for="estado">Activo/Inactivo</label>
            </div>
        </div>
    </form>
</div>
</div>
<?= $this->endSection() ?>