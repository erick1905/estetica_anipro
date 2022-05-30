<?php echo $this->extend('pages/plantilla'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Nueva Cita</h3>
        <div class="col-auto">
            <button form="formularioEmpleado" class="btn btn-primary btn-sm" title="Registrar empleado">
                Registrar cliente
            </button>
        </div>
    </div>
    <form action="<?php echo base_url('/registrarcita'); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <div class="col-md-6">
            <label for="fecha" class="form-label">Fecha de la cita año/mes/dia</label>
            <input required type="date" class="form-control" name="fecha" id="fecha">
        </div>
        <div class="col-md-6">
            <label for="hora" class="form-label">Hora</label>
            <input required type="text" size="5" class="form-control" name="hora" id="hora">
        </div>
        <div class="col-md-6">
            <label for="idcliente" class="form-label">Id_cliente</label>
            <input required type="text" class="form-control" name=" idcliente" id=" idcliente">
        </div>
</div>
</form>
</div>
</div>
<?= $this->endSection() ?>