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
        <h3 class="col-auto">Promociones activas</h3>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>monto vendido</td>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventasdia as $i => $cita) : ?>
                <tr>
                    <td><?= $var1 = $cita->monto_total; ?></td>
                    <td><?= $var2 = $cita->nombre_del_servicio; ?></td>

                </tr>
            <?php endforeach; ?>
            <tr>
                <td>venta total del dia =<?= $total->monto_total; ?></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<?= $this->endSection() ?>