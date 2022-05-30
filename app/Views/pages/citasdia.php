<?php echo $this->extend('pages/plantilla'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container mt-3">
    <div class="row justify-content-between align-items-center">
        <h3 class="col-auto">Citas del dia</h3>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>nombre</td>
                <td>fecha</td>
                <td>hora</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($citasdia as $i => $cita) : ?>
                <tr>

                    <td><?= $cita->cl_nombre; ?></td>
                    <td><?= $cita->fecha; ?></td>
                    <td><?= $cita->hora; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
<?= $this->endSection() ?>