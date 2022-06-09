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
    <form action="<?php echo base_url('actualizarservicio/' . $servicio->id_servicio); ?>" method="post" class="row g-3" id="formularioEmpleado">
        <div class="col-md-6">
            <label for="nombre_del_servicio" class="form-label">nombre_del_servicio</label>
            <input required type="text" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" title="el nombre solo debe contener minusculas de la a-z" class="form-control" value="<?= $servicio->nombre_del_servicio ?>" name=" nombre_del_servicio" id=" nombre_del_servicio">
        </div>

        <div class="col-md-6">
            <label for="costo_Venta" class="form-label">costo_Venta</label>
            <input required type="text" pattern="[0-1000]{}" title="el costo solo debe contener numeros" class="form-control" value="<?= $servicio->costo_Venta ?>" name=" costo_Venta" id=" costo_Venta">
        </div>
        <div class="col-md-6">
            <label for="precio_unitario" class="form-label">precio_unitario</label>
            <input required type="text" class="form-control" value="<?= $servicio->precio_unitario ?>" name=" precio_unitario" id=" precio_unitario">
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