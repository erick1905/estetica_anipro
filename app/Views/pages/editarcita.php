<?php echo $this->extend('pages/plantilla'); ?>
<?= $this->section('contenido') ?>
<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Editar Cita</h3>

        <div class="col-auto">
            <button form="formularioEmpleado" class="btn btn-primary btn-sm" title="Registrar empleado">
                Actualizar
            </button>
        </div>
    </div>
    <form action="<?php echo base_url('actualizarcita/' . $cita->id_cita); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <div class="col-md-6">
            <label for="fecha_ingreso" class="form-label">Fecha de cita año/mes/dia</label>
            <input required type="date" value="<?= $cita->fecha ?>" class="form-control" name="fecha" id="fecha">
        </div>
        <div class="col-md-6">
            <label for="usuario" class="form-label">hora</label>
            <input required type="text" class="form-control" value="<?= $cita->hora ?>" name=" hora" id=" hora">
        </div>
        <div class="col-md-6">
            <label for="usuario" class="form-label">Id_cliente</label>
            <input required type="text" class="form-control" value="<?= $cita->idcliente ?>" name=" idcliente" id=" idcliente">
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