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
    <form action="<?php echo base_url('actualizarpromo/' . $promocion->id_promocion); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <div class="col-md-6">
            <label for="id_servicio" class="form-label">id_servicio</label>
            <input required type="text" class="form-control" value="<?= $promocion->id_servicio ?>" name="id_servicio" id="id_servicio">
        </div>

        <div class="col-md-6">
            <label for="fecha_inicio" class="form-label">fecha_inicio</label>
            <input required type="date" class="form-control" value="<?= $promocion->fecha_inicio ?>" name="fecha_inicio" id="fecha_inicio">
        </div>
        <div class="col-md-6">
            <label for="fecha_fin" class="form-label">fecha_fin</label>
            <input required type="date" class="form-control" value="<?= $promocion->fecha_fin ?>" name=" fecha_fin" id=" fecha_fin">
        </div>
        <div class="col-md-6">
            <label for="porcentaje" class="form-label">porcentaje</label>
            <input required type="text" class="form-control" min="-10" max="10" title="el valor mínimo es 0 y el máximo es 100" value="<?= $promocion->porcentaje ?>" name=" porcentaje" id=" porcentaje">
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