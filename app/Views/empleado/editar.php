<?php echo $this->extend('pages/plantilla'); ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Editar Empleado</h3>

        <div class="col-auto">
            <button form="formularioEmpleado" class="btn btn-primary btn-sm" title="Registrar empleado">
                Actualizar
            </button>
        </div>
    </div>
    <form action="<?php echo base_url('/empleados/actualizar/' . $empleado->id_empleado); ?>" method="post" class="row g-3" id="formularioEmpleado">
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
            <input required type="date" value="<?= $empleado->fecha_ingreso ?>" class="form-control" name="fecha_ingreso" id="fecha_ingreso">
        </div>
        <div class="col-md-6">


            </select>
        </div>
        <div class="col-md-12">
            <label class="form-check-label" for="estado">Estado</label>
            <div class="col-md-6">
                <label for="estado" class="form-label">Estado</label>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" value="1" name="estado" id="activo" <?php echo $empleado->estado == 1 ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="activo">
                        Activo
                    </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" value="0" name="estado" id="inactivo" <?php echo $empleado->estado == 0 ? 'checked' : ''; ?>>
                    <label class="form-check-label" for="inactivo">
                        Inactivo
                    </label>
                </div>
            </div>
        </div>

    </form>
    <h4>Puestos</h4>
    <table class="table table-bordered table-striped table-responsive table-hover">
    </table>
</div>
</div>
<?php echo $this->endSection(); ?>