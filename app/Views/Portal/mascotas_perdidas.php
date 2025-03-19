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


<?= $this->section('content2') ?>

<div class="container mt-4">
        <h2 class="text-center mb-4">Reportes Activos</h2>
        <div class="row">
            <?php if (!empty($reportes)) : ?>
                <?php foreach ($reportes as $reporte) : ?>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <?php if (!empty($reporte->imagen)) : ?>
                                <img src="<?= base_url('uploads/' . $reporte->imagen) ?>" class="card-img-top" alt="Imagen del Reporte">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($reporte->titulo_reporte) ?></h5>
                                <p class="card-text"><?= esc($reporte->descripcion) ?></p>
                                <p><strong>Ubicación:</strong> <?= esc($reporte->ubi_lat) ?>, <?= esc($reporte->ubi_long) ?></p>
                                <span class="badge bg-success">Activo</span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center">No hay reportes activos.</p>
            <?php endif; ?>
        </div>
    </div>



<?= $this->endSection() ?>