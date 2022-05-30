<?php echo $this->extend('pages/plantilla'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Nueva Promocion</h3>
        <div class="col-auto">
            <button form="formularioEmpleado" class="btn btn-primary btn-sm" title="Registrar empleado">
                Registrar Promocion
            </button>
        </div>
    </div>
    <form action="<?php echo base_url('/registrarpromo'); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <div class="col-md-6">
            <label for="id_servicio" class="form-label">Id servicio</label>
            <input required type="text" size="5" class="form-control" name="id_servicio" id="id_servicio">
        </div>
        <div class="col-md-6">
            <label for="fecha_inicio" class="form-label">Inicio de la Promocion año/mes/dia</label>
            <input required type="date" class="form-control" name="fecha_inicio" id="fecha_inicio">
        </div>
        <div class="col-md-6">
            <label for="fecha_fin" class="form-label">Final de la Promocion año/mes/dia</label>
            <input required type="date" class="form-control" name="fecha_fin" id="fecha_fin">
        </div>
        <div class="col-md-6">
            <label for="porcentaje" class="form-label">porcentaje</label>
            <input required type="text" class="form-control" name=" porcentaje" id=" porcentaje">
        </div>
</div>
</form>
</div>
</div>
<?= $this->endSection() ?>