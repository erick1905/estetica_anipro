<?php echo $this->extend('pages/plantilla'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Descuento Popular</h3>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        </thead>
        <tbody>
            <?php foreach ($popular as $i => $cita) : ?>
                <tr>
                </tr>
            <?php endforeach; ?>
            <td>porcentaje de descuento mas usado del mes =<?= $popular->porcentaje; ?>%</td>
        </tbody>
    </table>
</div>
</div>
<?= $this->endSection() ?>