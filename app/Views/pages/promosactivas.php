<?php echo $this->extend('pages/plantilla'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Promociones activas</h3>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>nombre del servicio en promocion</td>
                <td>fecha inicio</td>
                <td>fecha final</td>
                <td>Porcentaje</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($promosactivas as $i => $cita) : ?>
                <tr>

                    <td><?= $cita->nombre_del_servicio; ?></td>
                    <td><?= $cita->fecha_inicio; ?></td>
                    <td><?= $cita->fecha_fin; ?></td>
                    <td><?= $cita->porcentaje; ?>%</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
<?= $this->endSection() ?>