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
<!-- DIV para un contenido o header de presentacion -->
<div class=" container text-center">
    <style>
        body {
            font-size: 20px;
        }
    </style>

    <body>
        <H4>&#10024; BIENVENID@ A TU ESTETICA PREFERIDA &#10024;</H4>
        <img class="d-block mx-auto mb-4" src="<?= base_url('img/A2.JPG') ?>" alt="" width="326" height="182">
        <H4>&#128132; LA BELLEZA COMIENZA CUANDO DECIDES SER TU MISM@ &#128132;</H4>
    </body>
</div>
<!-- DIV para contenido de ka app [tablas, forms, etc.] -->
</div>
<div class="container ">
    <ul>

    </ul>
    </style>
</div>
<?php echo $this->endSection(); ?>