<?php echo $this->extend('pages/plantilla'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">MONTO DEL MES</h3>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>monto vendido</td>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventasmes as $i => $cita) : ?>
                <tr>
                    <td><?= $var1 = $cita->monto_total; ?></td>

                </tr>
            <?php endforeach; ?>
            <tr>
                <td>venta total del mes =<?= $total->monto_total; ?></td>
                <td>Servicio popular del mes: =<?= "Cantidad: ", $popular->cantidad, " Nombre: ", $popular->nombre_del_servicio; ?></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<?= $this->endSection() ?>