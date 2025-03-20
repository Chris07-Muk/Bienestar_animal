<!-- Importartar las depedencias -->

<?= $this->extend("plantillas/panel_base") ?>

<!-- Seccion de css -->
<?= $this->section('css') ?>

<?= $this->endSection() ?>

<!-- Seccion de contenido -->
<?= $this->section('content') ?>
    
<?php if (session()->getFlashdata('welcome_message')): ?>
    <script>
        Swal.fire({
            icon: 'success',  // Tipo de alerta: éxito
            title: '¡Bienvenido!',
            text: '<?= session()->getFlashdata('welcome_message') ?>',
            showConfirmButton: true,
            confirmButtonColor: '#28a745',  // Color verde para éxito
            timer: 3000
        });
    </script>
<?php endif; ?>
<?= $this->endSection() ?>

<!-- Seccion de js -->
<?= $this->section('js') ?>

<?= $this->endSection() ?>

