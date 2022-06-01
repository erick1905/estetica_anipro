<!-- Inicio Contenido -->
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

<div class="container">

    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Reportes</h3>
    </div>
    <div class="row my-3 mx-1 gap-2">

        <div class="card bg-light border-0 shadow-sm col-md-3">
            <div class="card-body">
                <h5 class="card-title">citas por dia</h5>
                <h6 class="card-subtitle mb-2 text-muted">Reporte de citas</h6>
                <p class="card-text">Listado de citas del dia</p>
                <a href="<?= base_url('/citasdia'); ?>" class="btn btn-primary btn-sm">Ver Citas</a>
            </div>
        </div>
        <div class="card bg-light border-0 shadow-sm col-md-3">
            <div class="card-body">
                <h5 class="card-title">Descuento mas usado del mes</h5>
                <h6 class="card-subtitle mb-2 text-muted">Reporte de descuentos</h6>
                <p class="card-text">Listado de porcentaje de descuento mas usado en el mes</p>
                <a href="<?= base_url('/promopopular'); ?>" class="btn btn-primary btn-sm">Ver Popular</a>
            </div>
        </div>
        <div class="card bg-light border-0 shadow-sm col-md-3">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <h6 class="card-subtitle mb-2 text-muted">Reporte promociones activas</h6>
                <p class="card-text">Listado de las promociones que se encuentran activas</p>
                <a href="<?php echo base_url('/promosactivas'); ?>" class="btn btn-primary btn-sm">Ver promociones</a>
            </div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <h6 class="card-subtitle mb-2 text-muted">Reporte monto total del dia</h6>
                <p class="card-text">Mostrara la cantidad total de lo que se vendio en el dia</p>
                <a href="<?php echo base_url('/totalventasdia'); ?>" class="btn btn-primary btn-sm">Ver Monto total</a>
            </div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <h6 class="card-subtitle mb-2 text-muted">Reporte monto total del mes</h6>
                <p class="card-text">Mostrara la cantidad total de lo que se vendio en el mes</p>
                <a href="<?php echo base_url('/ventasmes'); ?>" class="btn btn-primary btn-sm">Ver Monto total del mes</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>