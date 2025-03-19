<!-- Importartar las depedencias -->
<?= $this->extend("plantillas/panel_base") ?>


<!-- Seccion de contenido -->
<?= $this->section('content') ?>
    <h1>
        seccion de las Adopciones
    </h1>


    <div class="container">
        <div class="row">
            <?php if (!empty($adopciones) && count($adopciones) > 0): ?>
                <?php foreach ($adopciones as $adopcion): ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="<?= esc($adopcion->img_adopcion) ?>" class="card-img-top" alt="Imagen de adopción" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($adopcion->tipo) ?> Adopción</h5>
                                <p class="card-text"><strong>Descripción:</strong> <?= esc($adopcion->descripcion_adopcion) ?></p>
                                <p class="card-text"><strong>Refugio:</strong> <?= esc($adopcion->nombre_refugio) ?></p>
                                <p class="card-text"><strong>Dirección del Refugio:</strong> <?= esc($adopcion->direccion_refugio) ?></p> <!-- Dirección agregada -->
                                <form action="<?= route_to('eliminar_adopcion', $adopcion->id_adopcion) ?>" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta adopción?');">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No se encontraron adopciones.</p>
            <?php endif; ?>
        </div>
    </div>



<a href="<?= route_to('agregar_adopcion') ?>" class="btn btn-success">Agregar Refugio</a>
<?= $this->endSection() ?>