<!-- Importartar las depedencias -->

<?= $this->extend("plantillas/portal_base") ?>

<!-- Titulo -->
<?= $this->section('titulo') ?>
    <?= $titulo_pagina ?>
<?= $this->endSection() ?>

<!-- Banner -->
<?= $this->section('banner') ?>
   inner_page
<?= $this->endSection() ?>


<<?= $this->section('content2') ?>


<h1 class="text-center my-4">Sección de Adopciones</h1>

<div class="container">
    <div class="row justify-content-center">
        <?php if (!empty($adopciones) && count($adopciones) > 0): ?>
            <?php foreach ($adopciones as $adopcion): ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="<?= esc($adopcion->img_adopcion) ?>" class="card-img-top" alt="Imagen de adopción" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($adopcion->tipo) ?> Adopción</h5>
                            <p class="card-text"><strong>Descripción:</strong> <?= esc($adopcion->descripcion_adopcion) ?></p>
                            <p class="card-text"><strong>Refugio:</strong> <?= esc($adopcion->nombre_refugio) ?></p>
                            <p class="card-text"><strong>Dirección del Refugio:</strong> <?= esc($adopcion->direccion_refugio) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">No se encontraron adopciones.</p>
        <?php endif; ?>
    </div>
</div>




<?= $this->endSection() ?>